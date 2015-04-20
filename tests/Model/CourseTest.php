<?php

/*
 * This file is part of the Opfura package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Opfura\SchoolBundle\Tests\Model;

use Opfura\SchoolBundle\Model\Course;

/**
 * CourseTest
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.2.0
 */
class CourseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test title
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.4.0
     */
    public function testTitle()
    {
        $course = new Course;
        $course->setTitle('Painting for beginners');

        $this->assertSame(
            'Painting for beginners',
            $course->getTitle()
        );
    }

    /**
     * Test __toString()
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.4.0
     */
    public function testToString()
    {
        $course = new Course;
        $course->setTitle('Painting for beginners');

        $this->assertSame(
            'Painting for beginners',
            (string) $course
        );
    }

    /**
     * Test createdAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.2.0
     */
    public function testCreatedAt()
    {
        $course = new Course;
        $course->setCreatedAt(new \DateTime(
            '2015-04-04 12:00:00'
        ));

        $this->assertSame(
            '2015-04-04 12:00:00',
            $course->getCreatedAt()->format('Y-m-d H:i:s')
        );
    }

    /**
     * Test updatedAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.2.0
     */
    public function testUpdatedAt()
    {
        $course = new Course;
        $course->setUpdatedAt(new \DateTime(
            '2015-04-04 12:00:00'
        ));

        $this->assertSame(
            '2015-04-04 12:00:00',
            $course->getUpdatedAt()->format('Y-m-d H:i:s')
        );
    }
}
