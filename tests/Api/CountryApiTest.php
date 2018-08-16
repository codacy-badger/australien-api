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
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * Delete a country is not possible.
     */
    public function testDeleteItem()
    {
        $client = static::createClient();
        $client->request('DELETE', '/api/countries/FR');
        self::assertFalse($client->getResponse()->isSuccessful());
        self::assertEquals(Response::HTTP_METHOD_NOT_ALLOWED, $client->getResponse()->getStatusCode());
    }

    /**
     * Update a country is not possible.
     */
    public function testUpdateItem()
    {
        $client = static::createClient();
        $client->request('PUT', '/api/countries/FR');
        self::assertFalse($client->getResponse()->isSuccessful());
        self::assertEquals(Response::HTTP_METHOD_NOT_ALLOWED, $client->getResponse()->getStatusCode());
    }

    /**
     * Create a country is not possible.
     */
    public function testCreateItem()
    {
        $client = static::createClient();
        $client->request('POST', '/api/countries/FR');
        self::assertFalse($client->getResponse()->isSuccessful());
        self::assertEquals(Response::HTTP_METHOD_NOT_ALLOWED, $client->getResponse()->getStatusCode());
    }
}