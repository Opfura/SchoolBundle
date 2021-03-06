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
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Teacher
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.6.0
 *
 * @Vich\Uploadable
 */
class Teacher implements TeacherInterface
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
     * @since  0.16.0
     *
     * @ORM\Column(type="string")
     */
    protected $firstname;

    /**
     * lastname
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.16.0
     *
     * @ORM\Column(type="string")
     */
    protected $lastname;

    /**
     * slug
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.8.0
     *
     * @Gedmo\Slug(fields={"firstname", "lastname"})
     * @ORM\Column(type="string", unique=true)
     */
    protected $slug;

    /**
     * miniBio
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.7.0
     *
     * @Assert\Length(
     *      min = 30,
     *      max = 5000,
     *      minMessage = "Mini bio must be at least {{ limit }} characters long",
     *      maxMessage = "Mini bio cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(type="text", name="mini_bio", nullable=true)
     */
    protected $miniBio;

    /**
     * websiteUrl
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.7.0
     *
     * @Assert\Url()
     * @ORM\Column(type="string", name="website_url", nullable=true)
     */
    protected $websiteUrl;

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
     * NOTE: This is not a mapped field of entity metadata, just a simple
     * property.
     *
     * @Vich\UploadableField(
     *     mapping="teacher_avatar",
     *     fileNameProperty="avatarFilename"
     * )
     *
     * @var File $avatar
     */
    protected $avatar;

    /**
     * @ORM\Column(
     *     type="string",
     *     length=255,
     *     name="avatar_filename",
     *     nullable=true
     * )
     *
     * @var string $avatarFilename
     */
    protected $avatarFilename;

    /**
     * Constructor
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.6.0
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
     * @since  0.7.0
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Get identifier
     *
     * Get id in format 006543
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.7.0
     *
     * @return string
     */
    public function getIdentifier()
    {
        return str_pad($this->id, 6, 0, STR_PAD_LEFT);
    }

    /**
     * Set user
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.6.0
     *
     * @param \Opfura\UserBundle\Model\UserInterface $user
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        $this->setFirstname($user->getFirstname());
        $this->setLastname($user->getLastname());
    }

    /**
     * Get user
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.6.0
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
     * @since  0.11.0
     *
     * @param Course $course
     *
     * @return Teacher
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
     * @since  0.11.0
     *
     * @return ArrayCollection|Course[]
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Get user's name
     *
     * Proxy to User::getName()
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.7.0
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->getUser()->getName();
    }

    /**
     * Set firstname
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.16.0
     *
     * @param string $firstname
     *
     * @return Teacher
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
     * @since  0.16.0
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
     * @return Teacher
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
     * @since  0.16.0
     *
     * @return string
     */
    public function getName()
    {
        return trim($this->getFirstname().' '.$this->getLastname());
    }

    /**
     * Set slug
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.13.0
     *
     * @param string
     *
     * @return Teacher
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
     * @since  0.8.0
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set miniBio
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.7.0
     *
     * @param string $miniBio
     *
     * @return Teacher
     */
    public function setMiniBio($miniBio)
    {
        $this->miniBio = $miniBio;

        return $this;
    }

    /**
     * Get miniBio
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.7.0
     *
     * @return string
     */
    public function getMiniBio()
    {
        return $this->miniBio;
    }

    /**
     * Set websiteUrl
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.7.0
     *
     * @param string $websiteUrl
     *
     * @return Teacher
     */
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    /**
     * Get websiteUrl
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.7.0
     *
     * @return string
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    /**
     * Set createdAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.6.0
     *
     * @param  \DateTime $createdAt
     *
     * @return Teacher
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
     * @since  0.6.0
     *
     * @param \DateTime $updatedAt
     *
     * @return Teacher
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
     * @since  0.6.0
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set avatar
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.15.0

     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $avatar
     */
    public function setAvatar(File $avatar = null)
    {
        $this->avatar = $avatar;

        if ($avatar) {
            $this->updatedAt = new \DateTime();
        }
    }

    /**
     * Get avatar
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.15.0
     *
     * @return File
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set avatarFilename
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.15.0
     *
     * @param string $avatarFilename
     */
    public function setAvatarFilename($avatarFilename)
    {
        $this->avatarFilename = $avatarFilename;
    }

    /**
     * Set avatarFilename
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.15.0
     *
     * @return string
     */
    public function getAvatarFilename()
    {
        return $this->avatarFilename;
    }
}
