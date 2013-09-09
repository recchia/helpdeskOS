<?php

namespace Recchia\HelpdeskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Recchia\HelpdeskBundle\Form\EventListener\AddTareaFieldSubscriber;
use Application\Sonata\UserBundle\Entity\User;

class IncidenciaType extends AbstractType
{
    private $user;

    public function __construct(User $user) 
    {
        $this->user = $user;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $factory = $builder->getFormFactory();
        $tareasuscriber = new AddTareaFieldSubscriber($factory);
        $builder->addEventSubscriber($tareasuscriber);
        $builder
            ->add('cedula', null, array('label' => 'Cédula', 'attr' => array('class' => 'form-control')))
            ->add('nombres', null, array('attr' => array('class' => 'form-control')))
            ->add('apellidos', null, array('attr' => array('class' => 'form-control')))
            ->add('incidencia', 'textarea', array('attr' => array('class' => 'form-control')))
            ->add('motivo', 'textarea', array('attr' => array('class' => 'form-control')))
            ->add('solucion', 'textarea', array('label' => 'Solución', 'attr' => array('class' => 'form-control')))
            ->add('unidad', null, array('empty_value' => '*** Seleccione una Unidad ***'))
            ->add('categoria', null, array('label' => 'Categoría', 'empty_value' => '*** Seleccione una Categoría ***'))
        ;
        if ($this->user->hasRole("ROLE_HELPDESK")) {
            $builder
                    ->add('tecnico', 'tecnico_input')
                    ->add('datos_tecnico', 'text', array('data' => $this->user->getFirstname() . ' ' . $this->user->getLastname(), 'mapped' => false, 'attr' => array('disabled' => true)))
                ;
        } else {
            $builder->add('tecnico', null, array('empty_value' => '*** Seleccione un Técnico ***'));
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Recchia\HelpdeskBundle\Entity\Incidencia'
        ));
    }

    public function getName()
    {
        return 'inass_helpdeskbundle_incidenciatype';
    }
}
