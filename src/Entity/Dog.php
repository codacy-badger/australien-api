<?php
/*
 * This file is part of the Berger Australien Application.
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;

use App\Exception\SexException;
use DateTime;
use Doctrine\Common\Collections\Collection;

/**
 * Dog class.
 *
 * Description.
 */
class Dog
{
    const FEMALE = false;

    const MALE = true;

    const UNKNOWN = null;

    const PLUSPLUS = 0;

    const PLUSMOINS = 1;

    const MOINSMOINS = 2;

    const A = 0;

    const B = 1;

    const C = 2;

    const D = 3;

    const LONGTAIL = 0;

    const HALFTAIL = 1;

    const NOTAIL = 2;

    /**
     * Dog id.
     *
     * @var int
     */
    private $dogId;

    /**
     * Dog birthday.
     *
     * @var DateTime
     */
    private $birthday;

    /**
     * Dog breeder.
     *
     * @var string
     */
    private $breeder;

    /**
     * Dog checkups
     *
     * @var Collection|Checkup
     */
    private $checkup;

    /**
     * Dog deathday.
     *
     * @var DateTime
     */
    private $deathday;

    /**
     * Dog name.
     *
     * @var string
     */
    private $name;

    /**
     * Dog pedigree number.
     *
     * @var string
     */
    private $pedigreeNumber;

    /**
     * Dog sex.
     *
     * self::MALE or self::FEMALE or null for UNKNOWN
     *
     * @var bool
     */
    private $sex;

    /**
     * Is dog sterilized?
     *
     * @var bool
     */
    private $sterilized = false;

    /**
     * Dog tatoo.
     *
     * @var string
     */
    private $tatoo;

    /**
     * UUID for dog link.
     *
     * @var string
     */
    private $uuid;

    /**
     * Health : HSF4.
     *
     * 0: +/+
     * 1: +/-
     * 2: -/-
     *
     * @var int
     */
    private $hsf4;

    /**
     * Genetic test to have HSF4 results.
     *
     * @var bool
     */
    private $hsf4_geneticTested = false;

    /**
     * Health : CEA.
     *
     * 0: +/+
     * 1: +/-
     * 2: -/-
     *
     * @var int
     */
    private $cea;

    /**
     * Genetic test done to know CEA results.
     *
     * @var bool
     */
    private $cea_geneticTested = false;

    /**
     * Health : PRA.
     *
     * 0: +/+
     * 1: +/-
     * 2: -/-
     *
     * @var int
     */
    private $pra;

    /**
     * Genetic test done to know PRA results.
     *
     * @var bool
     */
    private $pra_geneticTested = false;

    /**
     * Health : MDR1.
     *
     * 0: +/+
     * 1: +/-
     * 2: -/-
     *
     * @var int
     */
    private $mdr1;

    /**
     * Genetic test done to know MDR1 results.
     *
     * @var bool
     */
    private $mdr1_geneticTested = false;

    /**
     * Health : hanche dysplasie.
     *
     * 0: A
     * 1: B
     * 2: C
     * 3: D
     *
     * @var int
     */
    private $hd;

    /**
     * Health : ED.
     *
     * 0: A
     * 1: B
     * 2: C
     * 3: D
     *
     * @var int
     */
    private $ed;

    /**
     * Father.
     *
     * @var Dog
     */
    private $father;

    /**
     * Mother.
     *
     * @var Dog
     */
    private $mother;

    /**
     * Dog kennel.
     *
     * @var Kennel
     */
    private $kennel;

    /**
     * Dog owner.
     *
     * @var Person
     */
    private $owner;

    /**
     * Dog color.
     *
     * @var Color
     */
    private $color;

    /**
     * Tail.
     *
     * LONGTAIL = 0
     * HALFTAIL = 1
     * NOTAIL = 2
     *
     * @var int
     */
    private $tail;

    /**
     * Are health of these dogs compatible?
     *
     * @param Dog $dog
     *
     * @return bool
     */
    public function areHealthCompatible(Dog $dog): bool
    {
        return $this->areMdr1Compatible($dog)
            && $this->areHsf4Compatible($dog)
            && $this->arePraCompatible($dog)
            && $this->areCeaCompatible($dog)
            && $this->areHdCompatible($dog)
            && $this->areEdCompatible($dog)
            && $this->areTailCompatible($dog)
            && $this->areColorCompatible($dog);
    }

    /**
     * Can this dog have children?
     *
     * @return bool
     */
    public function canHaveNewChildren(): bool
    {
        return !$this->isSterilized() && !$this->isDead();
    }

    /**
     * Can this dog have safe children with provided dog?
     *
     * @param Dog
     *
     * @return bool
     */
    public function canHaveSafeChildrenWith(Dog $dog): bool
    {
        return $this->canHaveNewChildren()
            && $dog->canHaveNewChildren()
            && $this->areSexOpposed($dog)
            && $this->areHealthCompatible($dog);
    }

    /**
     * Dog ID getter.
     *
     * @return int
     */
    public function getDogId(): ?int
    {
        return $this->dogId;
    }

    /**
     * Dog getter.
     *
     * @return DateTime
     */
    public function getBirthday(): ?DateTime
    {
        return $this->birthday;
    }

    /**
     * Dog breeder getter.
     *
     * @return string
     */
    public function getBreeder(): ?string
    {
        return $this->breeder;
    }

    /**
     * Color getter.
     *
     * @return Color
     */
    public function getColor(): Color
    {
        return $this->color;
    }

    /**
     * Dog deathday getter.
     *
     * @return DateTime
     */
    public function getDeathday(): ?DateTime
    {
        return $this->deathday;
    }

    /**
     * Dog name getter.
     *
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Dog pedigree number getter.
     *
     * @return string
     */
    public function getPedigreeNumber(): ?string
    {
        return $this->pedigreeNumber;
    }

    /**
     * Tail getter.
     *
     * @return int
     */
    public function getTail(): ?int
    {
        return $this->tail;
    }

    /**
     * Is this dog dead?
     *
     * @return bool
     */
    public function isDead(): bool
    {
        return null !== $this->deathday;
    }

    /**
     * Is this dog a female?
     *
     * @return bool
     */
    public function isFemale(): bool
    {
        return self::FEMALE === $this->sex;
    }

    /**
     * Is this dog a male?
     *
     * @return bool
     */
    public function isMale(): bool
    {
        return self::MALE === $this->sex;
    }

    /**
     * Is the sex of this dog known?
     *
     * @return bool
     */
    public function isSexUnknown(): bool
    {
        return self::UNKNOWN === $this->sex;
    }

    /**
     * Is this dog sterilized.
     *
     * @return bool
     */
    public function isSterilized(): bool
    {
        return $this->sterilized;
    }

    /**
     * Dog tatoo getter.
     *
     * @return string
     */
    public function getTatoo(): ?string
    {
        return $this->tatoo;
    }

    /**
     * Dog HSF4 getter.
     *
     * @return int
     */
    public function getHsf4(): ?int
    {
        return $this->hsf4;
    }

    /**
     * Dog HSF4 genetic test getter.
     *
     * @return bool
     */
    public function isHsf4GeneticTested(): bool
    {
        return $this->hsf4_geneticTested;
    }

    /**
     * Dog CEA getter.
     *
     * @return int
     */
    public function getCea(): ?int
    {
        return $this->cea;
    }

    /**
     * Dog CEA genetic test getter.
     *
     * @return bool
     */
    public function isCeaGeneticTested()
    {
        return $this->cea_geneticTested;
    }

    /**
     * Dog PRA getter.
     *
     * @return int
     */
    public function getPra(): ?int
    {
        return $this->pra;
    }

    /**
     * Dog PRA genetic test getter.
     *
     * @return bool
     */
    public function isPraGeneticTested(): bool
    {
        return $this->pra_geneticTested;
    }

    /**
     * Dog MDR1 getter.
     *
     * @return int
     */
    public function getMdr1(): ?int
    {
        return $this->mdr1;
    }

    /**
     * Dog MDR1 genetic test getter.
     *
     * @return bool
     */
    public function isMdr1GeneticTested(): bool
    {
        return $this->mdr1_geneticTested;
    }

    /**
     * Dog HD getter.
     *
     * @return int
     */
    public function getHd(): ?int
    {
        return $this->hd;
    }

    /**
     * Dog ED getter.
     *
     * @return int
     */
    public function getEd(): ?int
    {
        return $this->ed;
    }

    /**
     * Dog father getter.
     *
     * @return Dog
     */
    public function getFather(): ?Dog
    {
        return $this->father;
    }

    /**
     * Dog getter.
     *
     * @return Dog
     */
    public function getMother(): ?Dog
    {
        return $this->mother;
    }

    /**
     * Dog kennel getter.
     *
     * @return Kennel
     */
    public function getKennel(): ?Kennel
    {
        return $this->kennel;
    }

    /**
     * Dog owner getter.
     *
     * @return Person
     */
    public function getOwner(): ?Person
    {
        return $this->owner;
    }

    /**
     * Dog birthday setter.
     *
     * @param DateTime $birthday
     */
    public function setBirthday(DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * Dog breeder setter.
     *
     * @param string $breeder
     */
    public function setBreeder(string $breeder): void
    {
        $this->breeder = $breeder;
    }

    /**
     * Color setter.
     *
     * @param Color $color
     */
    public function setColor(Color $color): void
    {
        $this->color = $color;
    }

    /**
     * Dog death day setter.
     *
     * @param DateTime $deathday
     */
    public function setDeathday(DateTime $deathday): void
    {
        $this->deathday = $deathday;
    }

    /**
     * Dog name setter.
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Dog pedigree number setter.
     *
     * @param string $pedigreeNumber
     */
    public function setPedigreeNumber(string $pedigreeNumber): void
    {
        $this->pedigreeNumber = $pedigreeNumber;
    }

    /**
     * Dog sex setter.
     *
     * @param bool $sex
     */
    public function setSex(bool $sex): void
    {
        $this->sex = $sex;
    }

    /**
     * Dog sterilized setter.
     *
     * @param bool $sterilized
     */
    public function setSterilized(bool $sterilized = true): void
    {
        $this->sterilized = $sterilized;
    }

    /**
     * Tail setter.
     *
     * @param int $tail
     */
    public function setTail(int $tail): void
    {
        $this->tail = $tail;
    }

    /**
     * Dog tatoo setter.
     *
     * @param string $tatoo
     */
    public function setTatoo(string $tatoo): void
    {
        $this->tatoo = $tatoo;
    }

    /**
     * Dog Hsf4 setter.
     *
     * @param int $hsf4
     */
    public function setHsf4(int $hsf4): void
    {
        $this->hsf4 = $hsf4;
    }

    /**
     * Dog HSF4 genetic test setter.
     *
     * @param bool $hsf4_geneticTested
     */
    public function setHsf4GeneticTested(bool $hsf4_geneticTested = true): void
    {
        $this->hsf4_geneticTested = $hsf4_geneticTested;
    }

    /**
     * Dog CEA setter.
     *
     * @param int $cea
     */
    public function setCea(int $cea): void
    {
        $this->cea = $cea;
    }

    /**
     * Dog Cea genetic test setter.
     *
     * @param bool $cea_geneticTested
     */
    public function setCeaGeneticTested(bool $cea_geneticTested = true): void
    {
        $this->cea_geneticTested = $cea_geneticTested;
    }

    /**
     * Dog PRA setter.
     *
     * @param int $pra
     */
    public function setPra(int $pra): void
    {
        $this->pra = $pra;
    }

    /**
     * Dog Pra genetic test setter.
     *
     * @param bool $pra_geneticTested
     */
    public function setPraGeneticTested(bool $pra_geneticTested = true): void
    {
        $this->pra_geneticTested = $pra_geneticTested;
    }

    /**
     * Dog MDR1 setter.
     *
     * @param int $mdr1
     */
    public function setMdr1(int $mdr1): void
    {
        $this->mdr1 = $mdr1;
    }

    /**
     * Dog MDR1 genetic test setter.
     *
     * @param bool $mdr1_geneticTested
     */
    public function setMdr1GeneticTested(bool $mdr1_geneticTested = true): void
    {
        $this->mdr1_geneticTested = $mdr1_geneticTested;
    }

    /**
     * Dog Hd setter.
     *
     * @param int $hd
     */
    public function setHd(int $hd): void
    {
        $this->hd = $hd;
    }

    /**
     * Dog Ed setter.
     *
     * @param int $ed
     */
    public function setEd(int $ed): void
    {
        $this->ed = $ed;
    }

    /**
     * Dog father setter.
     *
     * @param Dog $father
     *
     * @throws SexException
     */
    public function setFather(Dog $father): void
    {
        if (!$father->isMale()) {
            throw new SexException('Father must be a male');
        }
        $this->father = $father;
    }

    /**
     * Dog mother setter.
     *
     * @param Dog $mother
     *
     * @throws SexException
     */
    public function setMother(Dog $mother): void
    {
        if (!$mother->isFemale()) {
            throw new SexException('Mother must be a female');
        }
        $this->mother = $mother;
    }

    /**
     * Dog kennel setter.
     *
     * @param Kennel $kennel
     */
    public function setKennel(Kennel $kennel): void
    {
        $this->kennel = $kennel;
    }

    /**
     * Dog owner setter.
     *
     * @param Person $owner
     */
    public function setOwner(Person $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * Unset the deathday of the dog.
     */
    public function unsetDeathday(): void
    {
        $this->deathday = null;
    }

    /**
     * Are these dogs MDR1 compatible?
     *
     * @param Dog $dog
     *
     * @return bool
     */
    private function areMdr1Compatible(Dog $dog): bool
    {
        return 2 > $this->getMdr1() + $dog->getMdr1();
    }

    /**
     * Are these dogs CEA compatible?
     *
     * @param Dog $dog
     *
     * @return bool
     */
    private function areCeaCompatible(Dog $dog): bool
    {
        return 2 > $this->getCea() + $dog->getCea();
    }

    /**
     * Are these dogs PRA compatible?
     *
     * @param Dog $dog
     *
     * @return bool
     */
    private function arePraCompatible(Dog $dog): bool
    {
        return 2 > $this->getPra() + $dog->getPra();
    }

    /**
     * Are these dogs HSF4 compatible?
     *
     * @param Dog $dog
     *
     * @return bool
     */
    private function areHsf4Compatible(Dog $dog): bool
    {
        return 2 > $this->getHsf4() + $dog->getHsf4();
    }

    /**
     * Are these dogs ED compatible?
     *
     * @param Dog $dog
     *
     * @return bool
     */
    private function areEdCompatible(Dog $dog): bool
    {
        return 3 > $this->getEd() + $dog->getEd();
    }

    /**
     * Are these dogs HD compatible?
     *
     * @param Dog $dog
     *
     * @return bool
     */
    private function areHdCompatible(Dog $dog): bool
    {
        return 3 > $this->getHd() + $dog->getHd();
    }

    /**
     * Is there a male and a female.
     *
     * @param Dog $dog
     *
     * @return bool
     */
    private function areSexOpposed(Dog $dog): bool
    {
        return $this->isMale() && $dog->isFemale()
            || $this->isFemale() && $dog->isMale();
    }

    /**
     * 2 Notails can have unsafe children.
     *
     * @param Dog $dog
     *
     * @return bool
     */
    private function areTailCompatible(Dog $dog): bool
    {
        return 3 > $this->getTail() + $dog->getTail();
    }

    /**
     * 2 merl can have unsafe children.
     *
     * @param Dog $dog
     *
     * @return bool
     */
    private function areColorCompatible(Dog $dog): bool
    {
        return !($this->getColor()->isMerle() && $dog->getColor()->isMerle());
    }
}
