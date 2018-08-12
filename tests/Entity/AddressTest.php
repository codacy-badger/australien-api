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

use App\Entity\Address;
use App\Entity\Locality;
use CrEOF\Spatial\PHP\Types\Geometry\Point;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    /**
     * Entity to test.
     *
     * @var Address
     */
    private $address;

    /**
     * Set up the test case.
     */
    public function setUp(): void
    {
        $this->address = new Address();
    }

    /**
     * Test initialization.
     */
    public function testConstructor()
    {
        self::assertNull($this->address->getId());
        self::assertNull($this->address->getGeometry());
        self::assertNull($this->address->getLocality());
        self::assertNull($this->address->getPostalCode());
        self::assertNull($this->address->getPostOfficeBoxNumber());
        self::assertNull($this->address->getRegion());
        self::assertNull($this->address->getStreetAddress());
    }

    /**
     * Test postal code setter and getter.
     */
    public function testPostalCode()
    {
        $postalCode = '33680';

        $this->address->setPostalCode($postalCode);
        self::assertEquals($postalCode, $this->address->getPostalCode());
    }

    /**
     * Test locality setter and getter.
     */
    public function testLocality()
    {
        $locality = new Locality();

        $this->address->setLocality($locality);
        self::assertEquals($locality, $this->address->getLocality());
    }

    /**
     * Test geometry setter and getter.
     */
    public function testGeometry()
    {
        $geometry = new Point(1, 1);

        $this->address->setGeometry($geometry);
        self::assertEquals($geometry, $this->address->getGeometry());
    }

    /**
     * Test region setter and getter.
     */
    public function testRegion()
    {
        $region = 'Nouvelle Aquitaine';

        $this->address->setRegion($region);
        self::assertEquals($region, $this->address->getRegion());
    }

    /**
     * Test post office box number setter and getter.
     */
    public function testPostOfficeBoxNumber()
    {
        $postOfficeBoxNumber = 'CS0001';

        $this->address->setPostOfficeBoxNumber($postOfficeBoxNumber);
        self::assertEquals($postOfficeBoxNumber, $this->address->getPostOfficeBoxNumber());
    }

    /**
     * Test street address setter and getter.
     */
    public function testStreetAddress()
    {
        $streetAddress = '33680';

        $this->address->setStreetAddress($streetAddress);
        self::assertEquals($streetAddress, $this->address->getStreetAddress());
    }
}
