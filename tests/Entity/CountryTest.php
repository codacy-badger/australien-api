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
use CrEOF\Spatial\PHP\Types\Geometry\Point;
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
        self::assertNull($this->country->getIdentifier());
        self::assertNull($this->country->getGeometry());
        self::assertNull($this->country->getName());
    }

    /**
     * Test code setter and getter.
     */
    public function testCode()
    {
        $code = 'FR';

        $this->country->setIdentifier($code);
        self::assertEquals($code, $this->country->getIdentifier());
    }

    /**
     * Test geometry setter and getter.
     */
    public function testGeometry()
    {
        $geometry = new Point(1, 1);

        $this->country->setGeometry($geometry);
        self::assertEquals($geometry, $this->country->getGeometry());
    }

    /**
     * Test name setter and getter.
     */
    public function testName()
    {
        $name = 'name';

        $this->country->setName($name);
        self::assertEquals($name, $this->country->getName());
    }
}
