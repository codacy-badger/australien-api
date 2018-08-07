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
}