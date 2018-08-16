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
use Doctrine\Common\Collections\ArrayCollection;
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
     * Dog constructor.
     */
    public function __construct()
    {
        $this->checkup = new ArrayCollection();
    }

    /**
     * Are health of these dogs compatible?
     *
     * @param Dog $dog
     *
     * @return bool
     */
    public function areHealthCompatible(Dog $dog): bool
    {
        return $this->areCheckupCompatible($dog)
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
     * Get checkup collection.
     *
     * @return Checkup[]|Collection
     */
    public function getCheckup()
    {
        return $this->checkup;
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
     * Get UUID for the dog link and avoid spider.
     *
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
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

    /**
     * Test that all checkup are compatible.
     *
     * @param $dog
     * @return bool
     */
    private function areCheckupCompatible(Dog $dog): bool
    {
        foreach ($this->getCheckup() as $checkup) {
            foreach ($dog->getCheckup() as $otherCheckup) {
                if ($otherCheckup->getHealth()->getIdentifier() !== $checkup->getCheckup()->getIdentifier) {
                    continue;
                }
                if ($checkup->getValue() + $otherCheckup->getValue() >= $checkup->getHealth()->getMaximum()) {
                    return false;
                }
            }
        }

        return true;
    }
}
