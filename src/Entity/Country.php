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
 * Country class.
 *
 * Description.
 */
class Country implements SpatialInterface
{
    /*
     * Geometry trait implements geometry interface.
     */
    use SpatialTrait;

    /**
     * Code of country.
     *
     * @var string
     */
    private $identifier;

    /**
     * Country name.
     *
     * @var string
     */
    private $name;

    /**
     * Country code getter.
     *
     * @return string
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    /**
     * Country name getter.
     *
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Country code setter.
     *
     * @param string $identifier
     */
    public function setIdentifier(string $identifier): void
    {
        $this->identifier = $identifier;
    }

    /**
     * Country name setter.
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
