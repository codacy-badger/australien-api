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

use App\Entity\Health;
use PHPUnit\Framework\TestCase;

class HealthTest extends TestCase
{
    /**
     * Health entity to test.
     *
     * @var Health
     */
    private $health;

    /**
     * Setup checup before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->health = new Health();
    }

    /**
     * Test constructor.
     */
    public function testConstructor(): void
    {
        self::assertNotNull($this->health->getMaximum());
        self::assertEmpty($this->health->getMaximum());
    }
    
    /**
     * Test identifier getter and setter.
     */
    public function testGetIdentifier()
    {
        $identifier = 'identifier';
        $this->health->setIdentifier($identifier);
        self::assertEquals($identifier, $this->health->getIdentifier());
    }

    /**
     * Test maximum getter and setter.
     */
    public function testGetMaximum()
    {
        $maximum = 5;
        $this->health->setMaximum($maximum);
        self::assertEquals($maximum, $this->health->getMaximum());
    }
}
