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

/**
 * Address class.
 *
 * Description.
 */
class Address implements SpatialInterface
{
    /*
     * Geometry trait implements geometry interface.
     */
    use SpatialTrait;

    /**
     * Entity id.
     *
     * @var int
     */
    private $id;

    /**
     * Region.
     *
     * @var string
     */
    private $region;

    /**
     * Post office box number.
     *
     * @var string
     */
    private $postOfficeBoxNumber;

    /**
     * Postal code.
     *
     * @var string
     */
    private $postalCode;

    /**
     * Street address.
     *
     * @var string
     */
    private $streetAddress;

    /**
     * Locality.
     *
     * @var Locality
     */
    private $locality;

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
     * Region getter.
     *
     * @return string
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * Post office box number getter.
     *
     * @return string
     */
    public function getPostOfficeBoxNumber(): ?string
    {
        return $this->postOfficeBoxNumber;
    }

    /**
     * Postal code getter.
     *
     * @return string
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * Street address getter.
     *
     * @return string
     */
    public function getStreetAddress(): ?string
    {
        return $this->streetAddress;
    }

    /**
     * Locality address.
     *
     * @return Locality
     */
    public function getLocality(): ?Locality
    {
        return $this->locality;
    }

    /**
     * Region setter.
     *
     * @param string $region
     */
    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    /**
     * Post office box number setter.
     *
     * @param string $postOfficeBoxNumber
     */
    public function setPostOfficeBoxNumber(string $postOfficeBoxNumber): void
    {
        $this->postOfficeBoxNumber = $postOfficeBoxNumber;
    }

    /**
     * Postal code setter.
     *
     * @param string $postalCode
     */
    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * Street address setter.
     *
     * @param string $streetAddress
     */
    public function setStreetAddress(string $streetAddress): void
    {
        $this->streetAddress = $streetAddress;
    }

    /**
     * Locality setter.
     *
     * @param Locality $locality
     */
    public function setLocality(Locality $locality): void
    {
        $this->locality = $locality;
    }
}
