<?php
/*
 * This file is part of the Berger Australien Application.
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Entity;

use App\Entity\Country;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    /**
     * Entity to test.
     *
     * @var Country
     */
    private $country;

    /**
     * Set up the test case.
     */
    public function setUp(): void
    {
        $this->country = new Country();
    }

    /**
     * Test initialization.
     */
    public function testConstructor()
    {
        self::assertNull($this->country->getCode());
        self::assertNull($this->country->getIso());
        self::assertNull($this->country->getTld());
        self::assertNull($this->country->getName());
    }

    /**
     * Test code setter and getter.
     */
    public function testCode()
    {
        $code = 'FR';

        $this->country->setCode($code);
        self::assertEquals($code, $this->country->getCode());
    }

    /**
     * Test iso code setter and getter.
     */
    public function testIso()
    {
        $code = 'FR';

        $this->country->setIso($code);
        self::assertEquals($code, $this->country->getIso());
    }

    /**
     * Test tld code setter and getter.
     */
    public function testTld()
    {
        $code = 'FR';

        $this->country->setTld($code);
        self::assertEquals($code, $this->country->getTld());
    }

    /**
     * Test name code setter and getter.
     */
    public function testName()
    {
        $name = 'France';

        $this->country->setName($name);
        self::assertEquals($name, $this->country->getName());
    }
}
