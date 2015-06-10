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
     * slug
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.13.0
     *
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string", unique=true)
     */
    protected $slug;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    protected $description;

    /**
     * teacher
     *
     * @var \Opfura\SchoolBundle\Model\TeacherInterface
     */
    protected $teacher;

    /**
     * teacher2
     *
     * @var \Opfura\SchoolBundle\Model\TeacherInterface
     */
    protected $teacher2;

    /**
     * department
     *
     * @var \Opfura\SchoolBundle\Model\DepartmentInterface
     */
    protected $department;

    /**
     * lesson info
     *
     * @ORM\Column(
     *     type="string",
     *     name="lesson_info",
     *     nullable=true
     * )
     */
    protected $lessonInfo;

    /**
     * first lesson at
     *
     * @ORM\Column(
     *     type="datetime",
     *     name="first_lesson_at",
     *     nullable=true
     * )
     */
    protected $firstLessonAt;

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
     * __toString()
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.4.0
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * Get id
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.12.0
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

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
     * Set slug
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.13.0
     *
     * @param string
     *
     * @return Course
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
     * @since  0.13.0
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set description
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.11.0
     *
     * @param  string $description
     *
     * @return Course
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.11.0
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set teacher
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.11.0
     *
     * @param \Opfura\SchoolBundle\Model\TeacherInterface $teacher
     *
     * @return Course
     */
    public function setTeacher(TeacherInterface $teacher)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.11.0
     *
     * @return Teacher
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Set teacher2
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.14.0
     *
     * @param \Opfura\SchoolBundle\Model\TeacherInterface $teacher2
     *
     * @return Course
     */
    public function setTeacher2(TeacherInterface $teacher2)
    {
        $this->teacher2 = $teacher2;

        return $this;
    }

    /**
     * Get teacher2
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.14.0
     *
     * @return Teacher
     */
    public function getTeacher2()
    {
        return $this->teacher2;
    }

    /**
     * Set department
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.13.0
     *
     * @param \Opfura\SchoolBundle\Model\DepartmentInterface $department
     *
     * @return Course
     */
    public function setDepartment(DepartmentInterface $department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.13.0
     *
     * @return Department
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set lessonInfo
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.12.0
     *
     * @param  string $lessonInfo
     *
     * @return Course
     */
    public function setLessonInfo($lessonInfo)
    {
        $this->lessonInfo = $lessonInfo;

        return $this;
    }

    /**
     * Get lessonInfo
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.12.0
     *
     * @return string
     */
    public function getLessonInfo()
    {
        return $this->lessonInfo;
    }

    /**
     * Set firstLessonAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.12.0
     *
     * @param  \DateTime $firstLessonAt
     *
     * @return Course
     */
    public function setFirstLessonAt(\DateTime $firstLessonAt)
    {
        $this->firstLessonAt = $firstLessonAt;

        return $this;
    }

    /**
     * Get firstLessonAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.12.0
     *
     * @return \DateTime
     */
    public function getFirstLessonAt()
    {
        return $this->firstLessonAt;
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
