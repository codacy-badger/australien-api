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
class Country
{
    /**
     * Code of country.
     *
     * @var string
     */
    private $code;

    /**
     * Iso code of country.
     *
     * @var string
     */
    private $iso;

    /**
     * Tld code of country.
     *
     * @var string
     */
    private $tld;

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
     * Country iso code getter.
     *
     * @return string
     */
    public function getIso(): ?string
    {
        return $this->iso;
    }

    /**
     * Country tld code getter.
     *
     * @return string
     */
    public function getTld(): ?string
    {
        return $this->tld;
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
     * Country ISO setter.
     *
     * @param string $iso
     */
    public function setIso(string $iso): void
    {
        $this->iso = $iso;
    }

    /**
     * Country TLD setter.
     *
     * @param string $tld
     */
    public function setTld(string $tld): void
    {
        $this->tld = $tld;
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
