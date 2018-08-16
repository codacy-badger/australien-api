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

use App\Entity\Color;
use App\Entity\Kennel;
use App\Entity\Person;
use App\Exception\SexException;
use DateTime;
use App\Entity\Dog;
use PHPUnit\Framework\TestCase;

/**
 * Test for Dog class.
 *
 * Description.
 */
class DogTest extends TestCase
{
    /**
     * Entity to test.
     *
     * @var Dog
     */
    private $dog;

    /**
     * Set up the test case.
     */
    public function setUp(): void
    {
        $this->dog = new Dog();
        $this->dog->setColor(new Color());
    }

    /**
     * Test initialization.
     */
    public function testConstructor()
    {
        $dog = new Dog();

        self::assertTrue($this->dog->areHealthCompatible($dog));
        self::assertTrue($this->dog->canHaveNewChildren());
        self::assertNull($this->dog->getBirthday());
        self::assertNull($this->dog->getBreeder());
        self::assertNotNull($this->dog->getCheckup());
        self::assertEmpty($this->dog->getCheckup());
        self::assertNull($this->dog->getDeathday());
        self::assertNull($this->dog->getFather());
        self::assertNull($this->dog->getDogId());
        self::assertNull($this->dog->getKennel());
        self::assertNull($this->dog->getMother());
        self::assertNull($this->dog->getName());
        self::assertNull($this->dog->getOwner());
        self::assertNull($this->dog->getPedigreeNumber());
        self::assertNull($this->dog->getTatoo());
        self::assertNull($this->dog->getTail());
        self::assertFalse($this->dog->isDead());
        self::assertFalse($this->dog->isFemale());
        self::assertFalse($this->dog->isMale());
        self::assertTrue($this->dog->isSexUnknown());
        self::assertFalse($this->dog->isSterilized());
    }

    /**
     * Test private methods.
     */
    public function testAreHealthCompatible()
    {
        $dog = new Dog();
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $merle = new Color();
        $merle->setMerle(true);
        $dog->setColor($merle);
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $this->dog->setColor($merle);
        self::assertFalse($this->dog->areHealthCompatible($dog));

        $merle->setMerle(false);
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $dog->setTail(Dog::NOTAIL);
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $this->dog->setTail(Dog::HALFTAIL);
        self::assertFalse($this->dog->areHealthCompatible($dog));

        $dog->setTail(Dog::HALFTAIL);
        self::assertTrue($this->dog->areHealthCompatible($dog));
    }

    public function testCanHaveNewChildren()
    {
        $this->dog->setSterilized(true);
        self::assertFalse($this->dog->canHaveNewChildren());

        $this->dog->setDeathday(new \DateTime());
        self::assertFalse($this->dog->canHaveNewChildren());

        $this->dog->setSterilized(false);
        self::assertFalse($this->dog->canHaveNewChildren());

        $this->dog->unsetDeathday();
        self::assertTrue($this->dog->canHaveNewChildren());
    }

    public function testCanHaveSafeChildrenWith()
    {
        $dog = new Dog();
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $dog->setSterilized(true);
        self::assertFalse($this->dog->canHaveSafeChildrenWith($dog));
        self::assertFalse($dog->canHaveSafeChildrenWith($this->dog));

        $dog->setSterilized(false);
        self::assertFalse($this->dog->canHaveSafeChildrenWith($dog));
        self::assertFalse($dog->canHaveSafeChildrenWith($this->dog));

        $dog->setSex(Dog::MALE);
        self::assertFalse($this->dog->canHaveSafeChildrenWith($dog));

        $this->dog->setSex(Dog::FEMALE);
        self::assertTrue($this->dog->canHaveSafeChildrenWith($dog));
    }

    /**
     * Test getter and setter of birthday.
     */
    public function testBirthday()
    {
        $birthday = new DateTime();
        $this->dog->setBirthday($birthday);

        self::assertEquals($birthday, $this->dog->getBirthday());
    }

    /**
     * Test getter and setter of breeder.
     */
    public function testBreeder()
    {
        $breeder = 'breeder';
        $this->dog->setBreeder($breeder);

        self::assertEquals($breeder, $this->dog->getBreeder());
    }

    /**
     * Test getter and setter of color.
     */
    public function testColor()
    {
        $color = new Color();
        $this->dog->setColor($color);

        self::assertEquals($color, $this->dog->getColor());
    }

    /**
     * Test getter and setter of deathday.
     */
    public function testDeathday()
    {
        $deathday = new DateTime();
        $this->dog->setDeathday($deathday);
        self::assertEquals($deathday, $this->dog->getDeathday());
        self::assertTrue($this->dog->isDead());

        $this->dog->unsetDeathday();
        self::assertNull($this->dog->getDeathday());
        self::assertFalse($this->dog->isDead());
    }

    /**
     * Test getter and setter of name.
     */
    public function testName()
    {
        $name = 'name';
        $this->dog->setName($name);

        self::assertEquals($name, $this->dog->getName());
    }

    /**
     * Test getter and setter of pedigreeNumber.
     */
    public function testPedigreeNumber()
    {
        $pedigreeNumber = 'pedigreeNumber';
        $this->dog->setPedigreeNumber($pedigreeNumber);

        self::assertEquals($pedigreeNumber, $this->dog->getPedigreeNumber());
    }

    /**
     * Test getter and setter of sex.
     */
    public function testSex()
    {
        $this->dog->setSex(Dog::MALE);
        self::assertTrue($this->dog->isMale());
        self::assertFalse($this->dog->isFemale());
        self::assertFalse($this->dog->isSexUnknown());

        $this->dog->setSex(Dog::FEMALE);
        self::assertFalse($this->dog->isMale());
        self::assertTrue($this->dog->isFemale());
        self::assertFalse($this->dog->isSexUnknown());
    }

    /**
     * Test getter and setter of sterilization.
     */
    public function testSetSterilized()
    {
        $this->dog->setSterilized();
        self::assertTrue($this->dog->isSterilized());

        $this->dog->setSterilized(false);
        self::assertFalse($this->dog->isSterilized());

        $this->dog->setSterilized(true);
        self::assertTrue($this->dog->isSterilized());
    }

    /**
     * Test getter and setter of tatoo.
     */
    public function testTatoo()
    {
        $tatoo = 'tatoo';
        $this->dog->setTatoo($tatoo);

        self::assertEquals($tatoo, $this->dog->getTatoo());
    }

    /**
     * Test getter and setter of tail.
     */
    public function testTail()
    {
        $tail = Dog::NOTAIL;
        $this->dog->setTail($tail);

        self::assertEquals($tail, $this->dog->getTail());
    }

    /**
     * Test exception of father setter.
     *
     * @throws SexException
     */
    public function testFatherWithUnknownSex()
    {
        self::expectException(SexException::class);
        self::expectExceptionMessage('Father must be a male');

        $father = new Dog();
        $this->dog->setFather($father);
    }

    /**
     * Test exception of father setter.
     *
     * @throws SexException
     */
    public function testFatherWithFemale()
    {
        self::expectException(SexException::class);
        self::expectExceptionMessage('Father must be a male');

        $father = new Dog();
        $father->setSex(Dog::FEMALE);
        $this->dog->setFather($father);
    }

    /**
     * Test father getter and setter.
     *
     * @throws SexException
     */
    public function testFather()
    {
        $male = new Dog();
        $male->setSex(Dog::MALE);

        $this->dog->setFather($male);
        self::assertEquals($male, $this->dog->getFather());
    }

    /**
     * Test exception of mother setter.
     *
     * @throws SexException
     */
    public function testMotherWithUnknownSex()
    {
        self::expectException(SexException::class);
        self::expectExceptionMessage('Mother must be a female');

        $mother = new Dog();
        $this->dog->setMother($mother);
    }

    /**
     * Test exception of mother setter.
     *
     * @throws SexException
     */
    public function testMotherWithMale()
    {
        self::expectException(SexException::class);
        self::expectExceptionMessage('Mother must be a female');

        $mother = new Dog();
        $mother->setSex(Dog::MALE);
        $this->dog->setMother($mother);
    }

    /**
     * Test mother getter and setter.
     *
     * @throws SexException
     */
    public function testMother()
    {
        $female = new Dog();
        $female->setSex(Dog::FEMALE);

        $this->dog->setMother($female);
        self::assertEquals($female, $this->dog->getMother());
    }

    /**
     * Test kennel getter and setter.
     */
    public function testKennel()
    {
        $kennel = new Kennel();

        $this->dog->setKennel($kennel);
        self::assertEquals($kennel, $this->dog->getKennel());
    }

    /**
     * Test owner getter and setter.
     */
    public function testOwner()
    {
        $owner = new Person();

        $this->dog->setOwner($owner);
        self::assertEquals($owner, $this->dog->getOwner());
    }
}
