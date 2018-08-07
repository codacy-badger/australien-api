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

use DateTime;

/**
 * Dog class.
 *
 * Description.
 */
class Dog
{
    /**
     * Dog id.
     *
     * @var
     */
    private $id;

    /**
     * Dog birthday
     *
     * @var DateTime
     */
    private $birthday;

    /**
     * @var
     */
    private $breeder;

    /**
     * Dog deathday
     *
     * @var bool
     *
     */
    private $deathday;

    /**
     * Dog name.
     *
     * @var string
     *
     */
    private $name;

    /**
     * Dog pedigree number
     *
     * @var string
     *
     */
    private $pedigreeNumber;

    /**
     * Dog sex.
     *
     * @var bool
     */
    private $sex;

    /**
     * Is dog sterilized?
     *
     * @var bool
     */
    private $sterilized;

    /**
     * Dog tatoo
     *
     * @var
     */
    private $tatoo;

    /**
     * Health : HSF4
     *
     * 0: +/+
     * 1: +/-
     * 2: -/-
     *
     * @var int
     */
    private $hsf4;

    /**
     * Genetic test to have HSF4 results.
     *
     * @var bool
     */
    private $hsf4_gentest;

    /**
     * Health : CEA
     *
     * 0: +/+
     * 1: +/-
     * 2: -/-
     *
     * @var int
     */
    private $cea;

    private $cea_gentest;

    /**
     * Health : PRA
     *
     * 0: +/+
     * 1: +/-
     * 2: -/-
     *
     * @var int
     */
    private $pra;

    /**
     * Genetic test to have PRA results.
     *
     * @var bool
     */
    private $pra_gentest;

    /**
     * Health : MDR1
     *
     * 0: +/+
     * 1: +/-
     * 2: -/-
     *
     * @var int
     */
    private $mdr1;

    /**
     * Genetic test to have MDR1 results.
     *
     * @var bool
     */
    private $mdr1_gentest;

    /**
     * Health : hanche dysplasie
     *
     * 0: A
     * 1: B
     * 2: C
     * 3: D
     *
     * @var int
     */
    private $hd;

    /**
     * Health : ED
     *
     * 0: A
     * 1: B
     * 2: C
     * 3: D
     *
     * @var int
     */
    private $ed;

    /**
     * Father.
     *
     * @var Dog
     */
    private $father;

    /**
     * Mother
     *
     * @var Dog
     */
    private $mother;

    /**
     * Dog kennel.
     *
     * @var Kennel
     */
    private $kennel;

    /**
     * Dog owner
     *
     * @var Person
     */
    private $owner;
}