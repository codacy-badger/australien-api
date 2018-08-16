<?php
/*
 * This file is part of the Berger Australian Application.
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Entity;

use App\Entity\Checkup;
use App\Entity\Dog;
use App\Entity\Health;
use PHPUnit\Framework\TestCase;

/**
 * Test checkup entity.
 */
class CheckupTest extends TestCase
{
    /**
     * Checkup entity to test.
     *
     * @var Checkup
     */
    private $checkup;

    /**
     * Setup checup before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->checkup = new Checkup();
        $this->checkup->setHealth(new Health());
        $this->checkup->setDog(new Dog());
    }

    /**
     * Test constructor.
     */
    public function testConstructor(): void
    {
        self::assertNotNull($this->checkup->getHealth());
        self::assertNotNull($this->checkup->getDog());
        self::assertNotNull($this->checkup->getValue());
        self::assertEmpty($this->checkup->getValue());
    }

    /**
     * Test Health getter and setter.
     */
    public function testHealth(): void
    {
        $health = new Health();
        $this->checkup->setHealth($health);
        self::assertEquals($health, $this->checkup->getHealth());
    }

    /**
     * Test Dog getter and setter.
     */
    public function testDog(): void
    {
        $dog = new Dog();
        $this->checkup->setDog($dog);
        self::assertEquals($dog, $this->checkup->getDog());
    }

    /**
     * Test Value getter and setter.
     */
    public function testValue(): void
    {
        $value = 5;
        $this->checkup->setValue($value);
        self::assertEquals($value, $this->checkup->getValue());
    }
}
