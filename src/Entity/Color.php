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
     * Is there black in the robe?
     *
     * @var bool
     */
    private $black = false;

    /**
     * Is this a merl dog?
     *
     * @var bool
     */
    private $merle = false;

    /**
     * Is there red in the robe?
     *
     * @var bool
     */
    private $red = false;

    /**
     * Is there black in the color of the dog?
     *
     * Black getter.
     *
     * @return bool
     */
    public function isBlack(): bool
    {
        return $this->black;
    }

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
     * Is there red in the color of the dog?
     *
     * Red getter.
     *
     * @return bool
     */
    public function isRed(): bool
    {
        return $this->red;
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
     * Set black color.
     *
     * @param bool $black
     */
    public function setBlack(bool $black): void
    {
        $this->black = $black;
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

    /**
     * Red setter.
     *
     * @param bool $red
     */
    public function setRed(bool $red): void
    {
        $this->red = $red;
    }
}
