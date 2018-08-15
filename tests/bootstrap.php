<?php
/*
 * This file is part of the Berger Australian Application.
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__.'/../vendor/autoload.php';

$dotEnv = new Dotenv();
$dotEnv->load(__DIR__.'/../.env');
$dotEnv->populate([
    //'APP_ENV' => 'test',
    // ...
]);