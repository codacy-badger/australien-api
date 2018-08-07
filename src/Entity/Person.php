<?php
namespace App\Entity;

use Doctrine\Common\Collections\Collection;

/**
 * Person class.
 *
 * Description.
 */
class Person
{
    /**
     * Person id.
     *
     * @var
     */
    private $id;

    /**
     * Owner additionnal name.
     *
     * @var
     */
    private $additionalName;

    /**
     * Owner email.
     *
     * @var
     */
    private $email;

    /**
     * Owner family name.
     *
     * @var
     */
    private $familyName;

    /**
     * Owner given name.
     */
    private $givenName;

    /**
     * Owner job title.
     *
     * @var
     */
    private $jobTitle;

    /**
     * Owner name.
     *
     * @var
     */
    private $name;

    /**
     * Owner encrypted password.
     *
     * @var
     */
    private $password;

    /**
     * Is an active account?
     *
     * @var
     */
    private $active;

    /**
     * Owner address.
     *
     * @var
     */
    private $address;

    /**
     * Owner dogs.
     *
     * @var Dog[]|Collection
     */
    private $dogs;

    /**
     * Kennels owned by this person.
     *
     * @var Kennel[]|Collection
     */
    private $kennels;

}