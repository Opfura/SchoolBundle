<?php

/*
 * This file is part of the Opfura package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Opfura\SchoolBundle\Model\Course;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;

use Money\Money,
    Money\Currency;

use Opfura\SchoolBundle\Model\CourseInterface,
    Opfura\SchoolBundle\Model\StudentInterface;

/**
 * Course\Registration
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.17.0
 */
class Registration
{
    /**
     * id
     *
     * @var integer
     */
    protected $id;

    /**
     * course
     *
     * @var CourseInterface
     */
    protected $course;

    /**
     * student
     *
     * @var StudentInterface
     */
    protected $student;

    /**
     * price amount
     *
     * @ORM\Column(
     *     type="integer",
     *     name="price_amount"
     * )
     */
    protected $priceAmount = 0;

    /**
     * price currency
     *
     * @ORM\Column(
     *     type="string",
     *     name="price_currency"
     * )
     */
    protected $priceCurrency = 'USD';

    /**
     * Set price
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param Money $price
     *
     * @return Registration
     */
    public function setPrice(Money $price)
    {
        $this->priceAmount = $price->getAmount();
        $this->priceCurrency = $price->getCurrency()->getName();

        return $this;
    }

    /**
     * Get price
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @return Money
     */
    public function getPrice()
    {
        // If we have no currency, we create a Money object to return
        if (!$this->priceCurrency) {
            return null;
        }

        // If we have a currency but no amount, just return zero
        if (!$this->priceAmount) {
            return new Money(0, new Currency($this->priceCurrency));
        }

        return new Money(
            $this->priceAmount,
            new Currency($this->priceCurrency)
        );
    }

    /**
     * Set course
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param CourseInterface $course
     *
     * @return Registration
     */
    public function setCourse(CourseInterface $course)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @return Course
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set student
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @param StudentInterface $student
     *
     * @return Registration
     */
    public function setStudent(StudentInterface $student)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.17.0
     *
     * @return Student
     */
    public function getStudent()
    {
        return $this->student;
    }
}
