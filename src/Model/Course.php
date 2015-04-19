<?php

/*
 * This file is part of the Opfura package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Opfura\SchoolBundle\Model;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Course
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.2.0
 */
class Course
{
    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;

    /**
     * Set title
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.4.0
     *
     * @param  string $title
     *
     * @return Course
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.4.0
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set createdAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.2.0
     *
     * @param  \DateTime $createdAt
     *
     * @return Course
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.2.0
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.2.0
     *
     * @param \DateTime $updatedAt
     *
     * @return Course
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.2.0
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
