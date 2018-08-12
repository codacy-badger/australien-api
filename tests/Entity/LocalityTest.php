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
use App\Entity\Locality;
use CrEOF\Spatial\PHP\Types\Geometry\Point;
use PHPUnit\Framework\TestCase;

class LocalityTest extends TestCase
{
    /**
     * Entity to test.
     *
     * @var Locality
     */
    private $locality;

    /**
     * Setup the locality before each test.
     */
    public function setUp()
    {
        parent::setUp();
        $this->locality = new Locality();
    }

    /**
     * Test the constructor.
     */
    public function testConstructor()
    {
        self::assertNull($this->locality->getId());
        self::assertNull($this->locality->getGeometry());
    }

    /**
     * Test geometry setter and getter.
     */
    public function testGeometry()
    {
        $geometry = new Point(1, 1);

        $this->locality->setGeometry($geometry);
        self::assertEquals($geometry, $this->locality->getGeometry());
    }

    /**
     * Test the name getter and setter.
     */
    public function testName()
    {
        $name = 'name';
        $this->locality->setName($name);
        self::assertEquals($name, $this->locality->getName());
    }

    /**
     * Test the country getter and setter.
     */
    public function testCountry()
    {
        $country = new Country();
        $this->locality->setCountry($country);
        self::assertEquals($country, $this->locality->getCountry());
    }
}
