<?php
namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;

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