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

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Kennel class.
 *
 * Kennel where the dog is born.
 */
class Kennel
{
    /**
     * Kennel id.
     *
     * @var int
     */
    private $id;

    /**
     * Kennel legal name.
     *
     * @var string
     */
    private $legalName;

    /**
     * Kennel address.
     *
     * @var Address
     */
    private $address;

    /**
     * Dogs born in this kennel.
     *
     * @var Dog[]|Collection
     */
    private $dogs;

    /**
     * Kennel owner.
     *
     * @var Person
     */
    private $owner;

    /**
     * Kennel constructor.
     */
    public function __construct()
    {
        $this->dogs = new ArrayCollection();
    }

    /**
     * Kennel address getter.
     *
     * @return Address
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * Id kennel getter.
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Kennel dogs getter.
     *
     * @return Dog[]|Collection
     */
    public function getDogs(): Collection
    {
        return $this->dogs;
    }

    /**
     * Kennel legal name getter.
     *
     * @return string
     */
    public function getLegalName(): ?string
    {
        return $this->legalName;
    }

    /**
     * Kennel owner getter.
     *
     * @return Person
     */
    public function getOwner(): ?Person
    {
        return $this->owner;
    }

    /**
     * Kennel address setter.
     *
     * @param Address $address
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

    /**
     * Kennel legal name setter.
     *
     * @param string $legalName
     */
    public function setLegalName(string $legalName): void
    {
        $this->legalName = $legalName;
    }

    /**
     * Kennel owner setter.
     *
     * @param Person $owner
     */
    public function setOwner(Person $owner): void
    {
        $this->owner = $owner;
    }
}
