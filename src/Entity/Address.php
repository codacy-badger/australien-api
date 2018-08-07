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
 * Address class.
 *
 * Description.
 */
class Address
{
    /**
     * Entity id.
     *
     * @var int
     */
    private $id;

    /**
     * Region.
     *
     * @var string
     */
    private $region;

    /**
     * Post office box number.
     *
     * @var string
     */
    private $postOfficeBoxNumber;

    /**
     * Postal code.
     *
     * @var string
     */
    private $postalCode;

    /**
     * Street address.
     *
     * @var string
     */
    private $streetAdress;

    /**
     * Locality.
     *
     * @var Locality
     */
    private $locality;
}