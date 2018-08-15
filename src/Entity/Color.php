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
 * Color class.
 *
 * Color of the dog.
 */
class Color
{
    /**
     * Entity id.
     *
     * @var int
     */
    private $id;

    /**
     * Code of the color.
     *
     * @var string
     */
    private $identifier;

    /**
     * Name of the color.
     *
     * @var string
     */
    private $name;

    /**
     * Is this a merl dog?
     *
     * @var bool
     */
    private $merle = false;

    /**
     * Merle getter.
     *
     * @return bool
     */
    public function isMerle(): bool
    {
        return $this->merle;
    }

    /**
     * Id getter.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Color code getter.
     *
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * Country name getter.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Color code setter.
     *
     * @param string $identifier
     */
    public function setIdentifier(string $identifier): void
    {
        $this->identifier = $identifier;
    }

    /**
     * Color name setter.
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Merle setter.
     *
     * @param bool $merle
     */
    public function setMerle(bool $merle): void
    {
        $this->merle = $merle;
    }
}
