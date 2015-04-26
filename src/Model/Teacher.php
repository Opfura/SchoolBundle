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
use Opfura\UserBundle\Model\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Teacher
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.6.0
 */
class Teacher
{
    /**
     * user
     *
     * @var \Opfura\UserBundle\Model\UserInterface
     */
    protected $user;

    /**
     * name
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.8.0
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * slug
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.8.0
     *
     * @Gedmo\Slug(fields={"name"})
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
     *      max = 250,
     *      minMessage = "Mini bio must be at least {{ limit }} characters long",
     *      maxMessage = "Mini bio cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(type="string", name="mini_bio", nullable=true)
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
        if ($this->getUser()) {
            return $this->getUser()->getName();
        }

        return 'Unnamed teacher';
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

        $this->setName($user->getName());
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
     * Set name
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.8.0
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
     * @since  0.8.0
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
}
