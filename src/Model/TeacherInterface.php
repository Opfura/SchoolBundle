<?php

/*
 * This file is part of the Opfura package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Opfura\SchoolBundle\Model;

/**
 * TeacherInterface
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.11.0
 */
class Teacher
{
    /**
     * Get user
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.6.0
     *
     * @return \Opfura\UserBundle\Model\UserInterface
     */
    public function getUser();

    /**
     * Get slug
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.11.0
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get miniBio
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.11.0
     *
     * @return string
     */
    public function getMiniBio();

    /**
     * Get websiteUrl
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.11.0
     *
     * @return string
     */
    public function getWebsiteUrl();
}
