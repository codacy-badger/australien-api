<?php
/*
 * This file is part of the Berger Australian Application.
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class to test API on country.
 */
class CountryApiTest extends WebTestCase
{
    /**
     * Get all countries.
     */
    public function testGetCollection()
    {
        $client = static::createClient();
        $client->request('GET', '/api/countries.jsonld');
        self::assertTrue($client->getResponse()->isSuccessful());
        self::assertJson($client->getResponse()->getContent());

        $jsonResponse = json_decode($client->getResponse()->getContent());
        self::assertEquals('/api/contexts/Country', $jsonResponse->{'@context'});
        self::assertEquals('/api/countries', $jsonResponse->{'@id'});
        self::assertEquals('https://schema.org/Country', $jsonResponse->{'hydra:member'}[0]->{'@type'});
    }

    /**
     * Get all countries.
     */
    public function testGetItem()
    {
        $client = static::createClient();
        $client->request('GET', '/api/countries/FR.jsonld');
        self::assertTrue($client->getResponse()->isSuccessful());
        self::assertJson($client->getResponse()->getContent());

        $jsonResponse = json_decode($client->getResponse()->getContent());
        self::assertEquals('/api/contexts/Country', $jsonResponse->{'@context'});
        self::assertEquals('/api/countries/FR', $jsonResponse->{'@id'});
        self::assertEquals('https://schema.org/Country', $jsonResponse->{'@type'});
        self::assertEquals('FR', $jsonResponse->code);
        self::assertEquals('France', $jsonResponse->name);
        self::assertNull($jsonResponse->geometry);
    }
}