<?php
/*
 * This file is part of the Berger Australian Application.
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;

/**
 * Checkup entity.
 */
class Checkup
{
    /**
     * Health test done during this chekup.
     *
     * @var Health
     */
    private $health;

    /**
     * Dog checked.
     *
     * @var Dog
     */
    private $dog;

    /**
     * Checkup value.
     *
     * @var int
     */
    private $value = 0;

    /**
     * Health getter.
     *
     * @return Health
     */
    public function getHealth(): Health
    {
        return $this->health;
    }

    /**
     * Dog getter.
     *
     * @return Dog
     */
    public function getDog(): Dog
    {
        return $this->dog;
    }

    /**
     * Value getter.
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Health setter.
     *
     * @param Health $health
     */
    public function setHealth(Health $health): void
    {
        $this->health = $health;
    }

    /**
     * Dog setter.
     *
     * @param Dog $dog
     */
    public function setDog(Dog $dog): void
    {
        $this->dog = $dog;
    }

    /**
     * Value setter.
     *
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }
}
