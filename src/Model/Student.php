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
use Phospr\UserBundle\Model\UserInterface;

/**
 * Student
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.17.0
 */
class Student implements StudentInterface
{
    /**
     * user
     *
     * @var \Opfura\UserBundle\Model\UserInterface
     */
    protected $user;

    /**
     * courses
     *
     * @var ArrayCollection|Course[]
     */
    protected $courses;

    /**
     * firstname
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @ORM\Column(type="string")
     */
    protected $firstname;

    /**
     * lastname
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @ORM\Column(type="string")
     */
    protected $lastname;

    /**
     * email
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * slug
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.8.0
     *
     * @Gedmo\Slug(fields={"firstname", "lastname"})
     * @ORM\Column(type="string")
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
     *
     * @param \Opfura\UserBundle\Model\UserInterface $user
     */
    public function __construct(UserInterface $user = null)
    {
        if ($user) {
            $this->setUser($user);
        }

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
        return $this->getName();
    }

    /**
     * Set user
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param \Opfura\UserBundle\Model\UserInterface $user
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        $this->setFirstname($user->getFirstname());
        $this->setLastname($user->getLastname());
        $this->setEmail($user->getEmail());
    }

    /**
     * Get user
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @return \Opfura\UserBundle\Model\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add course
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param Course $course
     *
     * @return Student
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
     * Set firstname
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param string $firstname
     *
     * @return Student
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.16.0
     *
     * @param string $lastname
     *
     * @return Student
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.16.0
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
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
        return trim($this->getFirstname().' '.$this->getLastname());
    }

    /**
     * Set email
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param string $email
     *
     * @return Student
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set slug
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param string
     *
     * @return Student
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
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
     * @return Student
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
     * @since  0.6.0
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
     * @return Student
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
