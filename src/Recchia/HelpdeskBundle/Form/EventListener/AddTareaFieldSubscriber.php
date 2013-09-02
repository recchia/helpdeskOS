<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddTareaFieldSubscriber
 *
 * @author piero
 */
namespace Recchia\HelpdeskBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
use Recchia\HelpdeskBundle\Entity\Categoria;


class AddTareaFieldSubscriber implements EventSubscriberInterface {
    
    private $factory;
    
    public function __construct(FormFactoryInterface $factory) {
        $this->factory = $factory;
    }
    
    public static function getSubscribedEvents() {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_BIND => 'preBind'
        );
    }
    
    private function addTareaForm($form, $categoria) {
        $form->add($this->factory->createNamed('tarea', 'entity', null, array(
                    'class' => 'HelpdeskBundle:Tarea',
                    'empty_value' => '*** Seleccione ***',
                    'auto_initialize' => false,
                    'attr' => array('class' => 'form-control'),
                    'query_builder' => function (EntityRepository $repository) use ($categoria) {
                        $qb = $repository->createQueryBuilder('tarea')
                                ->innerJoin('tarea.categoria', 'categoria');
                        if ($categoria instanceof Categoria) {
                            $qb->where('tarea.categoria = :categoria')
                                    ->setParameter('categoria', $categoria);
                        } elseif (is_numeric($categoria)) {
                            $qb->where('categoria.id = :categoria')
                                    ->setParameter('categoria', $categoria);
                        } else {
                            $qb->where('categoria.descripcion = :categoria')
                                    ->setParameter('categoria', null);
                        }

                        return $qb;
                    }
        )));
    }
    
    public function preSetData(FormEvent $event) {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $categoria = ($data->getTarea()) ? $data->getTarea()->getCategoria() : null;
        $this->addTareaForm($form, $categoria);
    }
    
    public function preBind(FormEvent $event) {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }
        
        $categoria = array_key_exists('categoria', $data) ? $data['categoria'] : null;
        $this->addTareaForm($form, $categoria);
    }
}

?>
