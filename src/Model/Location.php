<?php

/*
 * This file is part of the Opfura package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Opfura\SchoolBundle\Model;

use Doctrine\Common\Collections\ArrayCollection,
    Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Location
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.17.0
 */
class Location implements LocationInterface
{
    /**
     * courses
     *
     * @var ArrayCollection|Course[]
     */
    protected $courses;

    /**
     * name
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * name
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $town;

    /**
     * slug
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.8.0
     *
     * @Gedmo\Slug(fields={"name", "town"})
     * @ORM\Column(type="string", unique=true)
     */
    protected $slug;

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
     * Constructor
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     */
    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    /**
     * __toString()
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @return string
     */
    public function __toString()
    {
        return trim($this->getName().', '.$this->getTown(), ', ');
    }

    /**
     * Add course
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param Course $course
     *
     * @return Location
     */
    public function addCourse(Course $course)
    {
        $this->courses[] = $course;

        return $this;
    }

    /**
     * Get courses
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @return ArrayCollection|Course[]
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Set name
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param string $name
     *
     * @return Teacher
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set town
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param string $town
     *
     * @return Location
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get town
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Get slug
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set createdAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param  \DateTime $createdAt
     *
     * @return Location
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
     * @since  0.17.0
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
     * @since  0.17.0
     *
     * @param \DateTime $updatedAt
     *
     * @return Location
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
     * @since  0.17.0
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
