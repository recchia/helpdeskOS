<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UnidadAdministrativaAdmin
 *
 * @author recchia
 */
namespace Recchia\HelpdeskBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class UnidadAdministrativaAdmin extends Admin {
    
    protected function configureListFields(ListMapper $list) {
        $list
            ->addIdentifier('nombre')
            ->add('codigo', null, array('label' => 'Código'))
            ->add('ubicacion', null, array('label' => 'Ubicación'))
            ->add('parent', null, array('label' => 'Dependencia'))
            ->add('isHelpdesk')
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $filter) {
        $filter
            ->add('nombre')
            ->add('codigo')
        ;
    }
    
    protected function configureShowField(ShowMapper $show) {
        $show
            ->add('nombre')
            ->add('codigo')
            ->add('ubicacion')
            ->add('parent', null, array('label' => 'Dependencia'))
            ->add('isHelpdesk')
        ;
    }
    
    protected function configureFormFields(FormMapper $form) {
        $form
            ->add('nombre')
            ->add('codigo')
            ->add('ubicacion')
            ->add('parent', null, array('label' => 'Dependencia'))
            ->add('isHelpdesk')
        ;
    }
}

?>
