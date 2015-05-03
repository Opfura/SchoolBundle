<?php

/*
 * This file is part of the Opfura package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Opfura\SchoolBundle\Tests\Model;

use Opfura\SchoolBundle\Model\Course,
    Opfura\SchoolBundle\Model\Teacher;

use Yeriki\UserBundle\Model\User;

/**
 * TeacherTest
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.6.0
 */
class TeacherTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test user
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.6.0
     */
    public function testUser()
    {
        $user = new User();
        $user->setFirstname('Chief');

        $teacher = new Teacher();
        $teacher->setUser($user);

        $this->assertSame(
            $user,
            $teacher->getUser()
        );
    }

    /**
     * Test contructor
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.8.0
     */
    public function testConstructor()
    {
        $user = new User();
        $user->setFirstname('Chief');

        $teacher = new Teacher($user);

        $this->assertSame(
            $user,
            $teacher->getUser()
        );

        $this->assertSame(
            'Chief',
            $teacher->getName()
        );
    }

    /**
     * Test setUser() sets name
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.8.0
     */
    public function testSetUserSetsName()
    {
        $user = new User();
        $user->setFirstname('Brandon');
        $user->setLastname('Brinnon');

        $teacher = new Teacher($user);

        $this->assertSame(
            'Brandon Brinnon',
            $teacher->getName()
        );
    }

    /**
     * Test courses
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.11.0
     */
    public function testCourses()
    {
        $teacher = new Teacher();

        $this->assertSame(0, $teacher->getCourses()->count());

        $teacher->addCourse(new Course());
        $teacher->addCourse(new Course());
        $teacher->addCourse(new Course());

        $this->assertSame(3, $teacher->getCourses()->count());
    }

    /**
     * Test name
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.8.0
     */
    public function testName()
    {
        $teacher = new Teacher();
        $teacher->setName('Corky Barofsky');

        $this->assertSame(
            'Corky Barofsky',
            $teacher->getName()
        );
    }

    /**
     * Test getUserName()
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.7.0
     */
    public function testGetUserName()
    {
        $user = new User();
        $user->setFirstname('Chief');
        $user->setLastname('McElroni');

        $teacher = new Teacher($user);

        $this->assertSame(
            'Chief McElroni',
            $teacher->getUserName()
        );
    }

    /**
     * Test miniBio
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.7.0
     */
    public function testMiniBio()
    {
        $teacher = new Teacher();
        $teacher->setMiniBio('Chief is a wonderful teacher');

        $this->assertSame(
            'Chief is a wonderful teacher',
            $teacher->getMiniBio()
        );
    }

    /**
     * Test websiteUrl
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.7.0
     */
    public function testWebsiteUrl()
    {
        $teacher = new Teacher();
        $teacher->setWebsiteUrl('http://example.com');

        $this->assertSame(
            'http://example.com',
            $teacher->getWebsiteUrl()
        );
    }

    /**
     * Test createdAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.6.0
     */
    public function testCreatedAt()
    {
        $teacher = new Teacher();
        $teacher->setCreatedAt(new \DateTime(
            '2015-04-04 12:00:00'
        ));

        $this->assertSame(
            '2015-04-04 12:00:00',
            $teacher->getCreatedAt()->format('Y-m-d H:i:s')
        );
    }

    /**
     * Test updatedAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.6.0
     */
    public function testUpdatedAt()
    {
        $teacher = new Teacher();
        $teacher->setUpdatedAt(new \DateTime(
            '2015-04-04 12:00:00'
        ));

        $this->assertSame(
            '2015-04-04 12:00:00',
            $teacher->getUpdatedAt()->format('Y-m-d H:i:s')
        );
    }
}
