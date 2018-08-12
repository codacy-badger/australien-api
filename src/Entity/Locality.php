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
 * Locality class.
 *
 * Resource legality.
 */
class Locality
{
    /**
     * Locality id.
     *
     * @var int
     */
    private $id;

    /**
     * Locality name.
     *
     * @var string
     */
    private $name;

    /**
     * Country of locality.
     *
     * @var Country
     */
    private $country;

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
     * Name getter.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Country getter.
     *
     * @return Country
     */
    public function getCountry(): Country
    {
        return $this->country;
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
     * Country setter.
     *
     * @param Country $country
     */
    public function setCountry(Country $country): void
    {
        $this->country = $country;
    }
}
