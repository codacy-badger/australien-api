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
    private $value;
}