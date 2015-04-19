<?php

/*
 * This file is part of the Opfura package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Opfura\SchoolBundle\Tests\Model;

use Opfura\SchoolBundle\Model\Lesson;

/**
 * LessonTest
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.2.0
 */
class LessonTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test createdAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.2.0
     */
    public function testCreatedAt()
    {
        $lesson = new Lesson;
        $lesson->setCreatedAt(new \DateTime(
            '2015-04-04 12:00:00'
        ));

        $this->assertSame(
            '2015-04-04 12:00:00',
            $lesson->getCreatedAt()->format('Y-m-d H:i:s')
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
        $lesson = new Lesson;
        $lesson->setUpdatedAt(new \DateTime(
            '2015-04-04 12:00:00'
        ));

        $this->assertSame(
            '2015-04-04 12:00:00',
            $lesson->getUpdatedAt()->format('Y-m-d H:i:s')
        );
    }
}
