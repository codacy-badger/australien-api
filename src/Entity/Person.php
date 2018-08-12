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
 * Person class.
 *
 * Description.
 */
class Person
{
    /**
     * Person id.
     *
     * @var int
     */
    private $id;

    /**
     * Owner additionnal name.
     *
     * @var string
     */
    private $additionalName;

    /**
     * Owner email.
     *
     * @var string
     */
    private $email;

    /**
     * Owner family name.
     *
     * @var string
     */
    private $familyName;

    /**
     * Owner given name.
     *
     * @var string
     */
    private $givenName;

    /**
     * Owner job title.
     *
     * @var string
     */
    private $jobTitle;

    /**
     * Owner name.
     *
     * @var string
     */
    private $name;

    /**
     * Owner encrypted password.
     *
     * @var string
     */
    private $password;

    /**
     * Is an active account?
     *
     * @var bool
     */
    private $active = false;

    /**
     * Owner address.
     *
     * @var Address
     */
    private $address;

    /**
     * Owner dogs.
     *
     * @var Dog[]|Collection
     */
    private $dogs;

    /**
     * Kennels owned by this person.
     *
     * @var Kennel[]|Collection
     */
    private $kennels;

    /**
     * Person constructor.
     */
    public function __construct()
    {
        $this->dogs = new ArrayCollection();
        $this->kennels = new ArrayCollection();
    }

    /**
     * Id getter.
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * AdditionalName getter.
     *
     * @return string
     */
    public function getAdditionalName(): ?string
    {
        return $this->additionalName;
    }

    /**
     * Email getter.
     *
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * FamilyName getter.
     *
     * @return string
     */
    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    /**
     * GivenName getter.
     *
     * @return string
     */
    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    /**
     * JobTitle getter.
     *
     * @return string
     */
    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    /**
     * Name getter.
     *
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Password getter.
     *
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Active getter.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * Address getter.
     *
     * @return Address
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * Dogs getter.
     *
     * @return Dog[]|Collection
     */
    public function getDogs(): Collection
    {
        return $this->dogs;
    }

    /**
     * Kennels getter.
     *
     * @return Kennel[]|Collection
     */
    public function getKennels(): Collection
    {
        return $this->kennels;
    }

    /**
     * AdditionalName setter.
     *
     * @param string $additionalName
     */
    public function setAdditionalName(string $additionalName): void
    {
        $this->additionalName = $additionalName;
    }

    /**
     * Email setter.
     *
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * FamilyName setter.
     *
     * @param string $familyName
     */
    public function setFamilyName(string $familyName): void
    {
        $this->familyName = $familyName;
    }

    /**
     * GivenName setter.
     *
     * @param string $givenName
     */
    public function setGivenName(string $givenName): void
    {
        $this->givenName = $givenName;
    }

    /**
     * JobTitle setter.
     *
     * @param string $jobTitle
     */
    public function setJobTitle(string $jobTitle): void
    {
        $this->jobTitle = $jobTitle;
    }

    /**
     * Name setter.
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Password setter.
     *
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Active setter.
     *
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * Address setter.
     *
     * @param Address $address
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }
}
