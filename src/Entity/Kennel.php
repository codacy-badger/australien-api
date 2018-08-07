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

use Doctrine\Common\Collections\Collection;

/**
 * Kennel class.
 *
 * Kennel where the dog is born.
 */
class Kennel
{
    /**
     * Kennel id.
     *
     * @var int
     */
    private $id;

    /**
     * Kennel legal name.
     *
     * @var string
     */
    private $legalName;

    /**
     * Kennel address.
     *
     * @var string
     */
    private $address;

    /**
     * Dogs born in this kennel.
     *
     * @var Dog[]|Collection
     */
    private $dogs;

    /**
     * Kennel owner.
     *
     * @var Person
     */
    private $owner;
}
