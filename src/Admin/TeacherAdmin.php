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

/**
 * TeacherAdmin
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.6.0
 */
class TeacherAdmin extends Admin
{
    /**
     * Fields to be shown on create/edit forms
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.6.0
     *
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('user')
            ->add('name')
            ->add('miniBio', 'textarea', array(
                'attr' => array(
                    'rows' => 3,
                ),
                'required' => false,
            ))
            ->add('websiteUrl')
            ->add('avatar', 'file', array(
                'required' => false,
            ))
        ;
    }

    /**
     * Fields to be shown on filter forms
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.6.0
     *
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('user')
            ->add('name')
            ->add('websiteUrl')
        ;
    }


    /**
     * Fields to be shown on lists
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.6.0
     *
     * @param DatagridMapper $datagridMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('identifier')
            ->add('user')
            ->add('name')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
