<?php

/*
 * This file is part of the Opfura package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Opfura\SchoolBundle\Tests\Model;

use Opfura\SchoolBundle\Model\Teacher,
    Opfura\UserBundle\Model\User;

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

        $teacher = new Teacher($user);

        $this->assertSame(
            'Chief',
            $teacher->getUser()->getName()
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
        $teacher = new Teacher(new User());
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
        $teacher = new Teacher(new User());
        $teacher->setUpdatedAt(new \DateTime(
            '2015-04-04 12:00:00'
        ));

        $this->assertSame(
            '2015-04-04 12:00:00',
            $teacher->getUpdatedAt()->format('Y-m-d H:i:s')
        );
    }
}
