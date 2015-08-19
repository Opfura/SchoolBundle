<?php

/*
 * This file is part of the Opfura package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Opfura\SchoolBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * LocationAdmin
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.17.0
 */
class LocationAdmin extends Admin
{
    /**
     * Fields to be shown on show page
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('town')
        ;
    }

    /**
     * Fields to be shown on create/edit forms
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('town')
        ;
    }

    /**
     * Fields to be shown on filter forms
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('town')
        ;
    }


    /**
     * Fields to be shown on lists
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param DatagridMapper $datagridMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array(
                'route' => array('name' => 'show')
            ))
            ->add('town')
        ;
    }
}
