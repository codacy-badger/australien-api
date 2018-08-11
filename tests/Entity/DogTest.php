<?php
/*
 * This file is part of the GMAO Application.
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Entity;

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
        self::assertNull($this->dog->getCea());
        self::assertNull($this->dog->getDeathday());
        self::assertNull($this->dog->getEd());
        self::assertNull($this->dog->getFather());
        self::assertNull($this->dog->getId());
        self::assertNull($this->dog->getHd());
        self::assertNull($this->dog->getHsf4());
        self::assertNull($this->dog->getKennel());
        self::assertNull($this->dog->getMdr1());
        self::assertNull($this->dog->getMother());
        self::assertNull($this->dog->getName());
        self::assertNull($this->dog->getOwner());
        self::assertNull($this->dog->getPedigreeNumber());
        self::assertNull($this->dog->getPra());
        self::assertNull($this->dog->getTatoo());
        self::assertFalse($this->dog->isCeaGeneticTested());
        self::assertFalse($this->dog->isDead());
        self::assertFalse($this->dog->isHsf4GeneticTested());
        self::assertFalse($this->dog->isFemale());
        self::assertFalse($this->dog->isMale());
        self::assertFalse($this->dog->isMdr1GeneticTested());
        self::assertFalse($this->dog->isPraGeneticTested());
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

        $dog->setMdr1(Dog::MOINSMOINS);
        self::assertFalse($this->dog->areHealthCompatible($dog));

        $dog->setMdr1(Dog::PLUSMOINS);
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $this->dog->setMdr1(Dog::PLUSMOINS);
        self::assertFalse($this->dog->areHealthCompatible($dog));

        $dog->setMdr1(Dog::PLUSPLUS);
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $dog->setHsf4(Dog::MOINSMOINS);
        self::assertFalse($this->dog->areHealthCompatible($dog));

        $dog->setHsf4(Dog::PLUSMOINS);
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $this->dog->setHsf4(Dog::PLUSMOINS);
        self::assertFalse($this->dog->areHealthCompatible($dog));

        $dog->setHsf4(Dog::PLUSPLUS);
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $dog->setPra(Dog::MOINSMOINS);
        self::assertFalse($this->dog->areHealthCompatible($dog));

        $dog->setPra(Dog::PLUSMOINS);
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $this->dog->setPra(Dog::PLUSMOINS);
        self::assertFalse($this->dog->areHealthCompatible($dog));

        $dog->setPra(Dog::PLUSPLUS);
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $dog->setCea(Dog::MOINSMOINS);
        self::assertFalse($this->dog->areHealthCompatible($dog));

        $dog->setCea(Dog::PLUSMOINS);
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $this->dog->setCea(Dog::PLUSMOINS);
        self::assertFalse($this->dog->areHealthCompatible($dog));

        $dog->setCea(Dog::PLUSPLUS);
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $dog->setEd(Dog::D);
        self::assertFalse($this->dog->areHealthCompatible($dog));

        $dog->setEd(Dog::C);
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $this->dog->setEd(Dog::B);
        self::assertFalse($this->dog->areHealthCompatible($dog));

        $dog->setEd(Dog::B);
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $dog->setHd(Dog::D);
        self::assertFalse($this->dog->areHealthCompatible($dog));

        $dog->setHd(Dog::C);
        self::assertTrue($this->dog->areHealthCompatible($dog));

        $this->dog->setHd(Dog::B);
        self::assertFalse($this->dog->areHealthCompatible($dog));

        $dog->setHd(Dog::B);
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
     * Test getter and setter of hsf4.
     */
    public function testHsf4()
    {
        $hsf4 = Dog::MOINSMOINS;
        $this->dog->setHsf4($hsf4);

        self::assertEquals($hsf4, $this->dog->getHsf4());
    }

    /**
     * Test getter and setter of sterilization.
     */
    public function testSetHsf4GeneticTested()
    {
        $this->dog->setHsf4GeneticTested();
        self::assertTrue($this->dog->isHsf4GeneticTested());

        $this->dog->setHsf4GeneticTested(false);
        self::assertFalse($this->dog->isHsf4GeneticTested());

        $this->dog->setHsf4GeneticTested(true);
        self::assertTrue($this->dog->isHsf4GeneticTested());
    }

    /**
     * Test getter and setter of cea.
     */
    public function testCea()
    {
        $cea = Dog::MOINSMOINS;
        $this->dog->setCea($cea);

        self::assertEquals($cea, $this->dog->getCea());
    }

    /**
     * Test getter and setter of sterilization.
     */
    public function testSetCeaGeneticTested()
    {
        $this->dog->setCeaGeneticTested();
        self::assertTrue($this->dog->isCeaGeneticTested());

        $this->dog->setCeaGeneticTested(false);
        self::assertFalse($this->dog->isCeaGeneticTested());

        $this->dog->setCeaGeneticTested(true);
        self::assertTrue($this->dog->isCeaGeneticTested());
    }

    /**
     * Test getter and setter of mdr1.
     */
    public function testMdr1()
    {
        $mdr1 = Dog::MOINSMOINS;
        $this->dog->setMdr1($mdr1);

        self::assertEquals($mdr1, $this->dog->getMdr1());
    }

    /**
     * Test getter and setter of sterilization.
     */
    public function testSetMdr1GeneticTested()
    {
        $this->dog->setMdr1GeneticTested();
        self::assertTrue($this->dog->isMdr1GeneticTested());

        $this->dog->setMdr1GeneticTested(false);
        self::assertFalse($this->dog->isMdr1GeneticTested());

        $this->dog->setMdr1GeneticTested(true);
        self::assertTrue($this->dog->isMdr1GeneticTested());
    }

    /**
     * Test getter and setter of pra.
     */
    public function testPra()
    {
        $pra = Dog::MOINSMOINS;
        $this->dog->setPra($pra);

        self::assertEquals($pra, $this->dog->getPra());
    }

    /**
     * Test getter and setter of sterilization.
     */
    public function testSetPraGeneticTested()
    {
        $this->dog->setPraGeneticTested();
        self::assertTrue($this->dog->isPraGeneticTested());

        $this->dog->setPraGeneticTested(false);
        self::assertFalse($this->dog->isPraGeneticTested());

        $this->dog->setPraGeneticTested(true);
        self::assertTrue($this->dog->isPraGeneticTested());
    }

    /**
     * Test getter and setter of ed.
     */
    public function testEd()
    {
        $ed = Dog::C;
        $this->dog->setEd($ed);

        self::assertEquals($ed, $this->dog->getEd());
    }

    /**
     * Test getter and setter of hd.
     */
    public function testHd()
    {
        $hd = Dog::C;
        $this->dog->setHd($hd);

        self::assertEquals($hd, $this->dog->getHd());
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
