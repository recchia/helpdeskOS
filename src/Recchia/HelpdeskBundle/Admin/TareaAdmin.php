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

class TareaAdmin extends Admin {
    
    protected function configureListFields(ListMapper $list) {
        $list
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('categoria', null, array('label' => 'Categoría'))
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $filter) {
        $filter
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('categoria', null, array('label' => 'Categoría'))
        ;
    }
    
    protected function configureShowField(ShowMapper $show) {
        $show
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('categoria', null, array('label' => 'Categoría'))
        ;
    }
    
    protected function configureFormFields(FormMapper $form) {
        $form
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('categoria', null, array('label' => 'Categoría'))
        ;
    }
}

?>
