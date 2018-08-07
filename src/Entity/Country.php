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
 * Country class.
 *
 * Description.
 */
class Country
{
    /**
     * Code of country.
     *
     * @var string
     */
    private $code;

    /**
     * Iso code of country.
     *
     * @var string
     */
    private $iso;

    /**
     * Tld code of country.
     *
     * @var string
     */
    private $tld;

    /**
     * Country name.
     *
     * @var string
     */
    private $name;
}