<?php
namespace App\App\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 */
class Kennel
{
    /**
     */
    private $id;

    /**
     */
    private $legalName;

    /**
     */
    private $address;

    /**
     */
    private $dogs;

    /**
     */
    private $owner;
}