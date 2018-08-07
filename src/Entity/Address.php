<?php
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