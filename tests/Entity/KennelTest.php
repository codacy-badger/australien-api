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
use App\Entity\Dog;
use App\Entity\Kennel;
use App\Entity\Person;
use PHPUnit\Framework\TestCase;

class KennelTest extends TestCase
{
    /**
     * Entity to test.
     *
     * @var Kennel
     */
    private $kennel;

    /**
     * Setup kennel before each test.
     */
    public function setUp()
    {
        $this->kennel = new Kennel();
    }

    /**
     * Test initialization from constructor.
     */
    public function testConstruct()
    {
        self::assertNull($this->kennel->getAddress());
        self::assertNull($this->kennel->getKennelId());
        self::assertNotNull($this->kennel->getDogs());
        self::assertEmpty($this->kennel->getDogs());
        self::assertNull($this->kennel->getLegalName());
        self::assertNull($this->kennel->getOwner());
    }

    /**
     * Test address getter and setter.
     */
    public function testAddress()
    {
        $address = new Address();

        $this->kennel->setAddress($address);
        self::assertEquals($address, $this->kennel->getAddress());
    }

    /**
     * Test dogs name getter and setter.
     */
    public function testDogs()
    {
        $dog = new Dog();

        $this->kennel->getDogs()->add($dog);
        self::assertTrue($this->kennel->getDogs()->contains($dog));
    }

    /**
     * Test legal name getter and setter.
     */
    public function testLegalName()
    {
        $legalName = 'legal name';

        $this->kennel->setLegalName($legalName);
        self::assertEquals($legalName, $this->kennel->getLegalName());
    }

    /**
     * Test owner getter and setter.
     */
    public function testOwner()
    {
        $owner = new Person();

        $this->kennel->setOwner($owner);
        self::assertEquals($owner, $this->kennel->getOwner());
    }
}
