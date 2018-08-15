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
     * @TODO rename code into identifier
     *
     * @var string
     */
    private $code;

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
    public function getCode(): ?string
    {
        return $this->code;
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
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
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
