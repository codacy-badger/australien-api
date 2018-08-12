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
use App\Entity\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    /**
     * Entity to test.
     *
     * @var Person
     */
    private $person;

    /**
     * Setup the person to test before each test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->person = new Person();
    }

    /**
     * Test the constructor.
     */
    public function testConstructor()
    {
        self::assertNull($this->person->getAdditionalName());
        self::assertNull($this->person->getAddress());
        self::assertNotNull($this->person->getDogs());
        self::assertEmpty($this->person->getDogs());
        self::assertNull($this->person->getEmail());
        self::assertNull($this->person->getFamilyName());
        self::assertNull($this->person->getId());
        self::assertNull($this->person->getJobTitle());
        self::assertNotNull($this->person->getKennels());
        self::assertEmpty($this->person->getKennels());
        self::assertNull($this->person->getName());
        self::assertNull($this->person->getPassword());
        self::assertFalse($this->person->isActive());
    }

    /**
     * Test the method SetAdditionalName.
     */
    public function testSetAdditionalName()
    {
        $additionalName = 'Additional name';
        $this->person->setAdditionalName($additionalName);
        self::assertEquals($additionalName, $this->person->getAdditionalName());
    }

    /**
     * Test the method SetAddress.
     */
    public function testSetAddress()
    {
        $address = new Address();
        $this->person->setAddress($address);
        self::assertEquals($address, $this->person->getAddress());
    }

    /**
     * Test the method SetDogs.
     */
    public function testSetDogs()
    {
        $dog = new Dog();
        $this->person->getDogs()->add($dog);
        self::assertTrue($this->person->getDogs()->contains($dog));
    }

    /**
     * Test the method SetKennels.
     */
    public function testSetKennels()
    {
        $dog = new Dog();
        $this->person->getKennels()->add($dog);
        self::assertTrue($this->person->getKennels()->contains($dog));
    }

    /**
     * Test the method SetEmail.
     */
    public function testSetEmail()
    {
        $email = 'email';
        $this->person->setEmail($email);
        self::assertEquals($email, $this->person->getEmail());
    }

    /**
     * Test the method SetFamilyName.
     */
    public function testSetFamilyName()
    {
        $familyName = 'Family name';
        $this->person->setFamilyName($familyName);
        self::assertEquals($familyName, $this->person->getFamilyName());
    }

    /**
     * Test the method SetJobTitle.
     */
    public function testSetJobTitle()
    {
        $jobTitle = 'Job Title';
        $this->person->setJobTitle($jobTitle);
        self::assertEquals($jobTitle, $this->person->getJobTitle());
    }

    /**
     * Test the method SetName.
     */
    public function testSetName()
    {
        $name = 'Name';
        $this->person->setName($name);
        self::assertEquals($name, $this->person->getName());
    }

    /**
     * Test the method SetPassword.
     */
    public function testSetPassword()
    {
        $password = 'Password';
        $this->person->setPassword($password);
        self::assertEquals($password, $this->person->getPassword());
    }

    /**
     * Test the method SetGivenName.
     */
    public function testSetGivenName()
    {
        $givenName = 'Given name';
        $this->person->setGivenName($givenName);
        self::assertEquals($givenName, $this->person->getGivenName());
    }

    /**
     * Test the method SetActive.
     */
    public function testSetActive()
    {
        $this->person->setActive(true);
        self::assertTrue($this->person->isActive());
        $this->person->setActive(false);
        self::assertFalse($this->person->isActive());
    }
}
