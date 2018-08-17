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
 * Class to test API on locality.
 */
class LocalityApiTest extends WebTestCase
{
    /**
     * Get all localities.
     */
    public function testGetCollection()
    {
        $client = static::createClient();
        $client->request('GET', '/api/localities.jsonld');
        self::assertTrue($client->getResponse()->isSuccessful());
        self::assertJson($client->getResponse()->getContent());

        $jsonResponse = json_decode($client->getResponse()->getContent());
        self::assertEquals('/api/contexts/Locality', $jsonResponse->{'@context'});
        self::assertEquals('/api/localities', $jsonResponse->{'@id'});
        self::assertEquals('https://schema.org/addressLocality', $jsonResponse->{'hydra:member'}[0]->{'@type'});
    }

    /**
     * Get all localities.
     */
    public function testGetItem()
    {
        $client = static::createClient();
        $client->request('GET', '/api/localities/1.jsonld');
        self::assertTrue($client->getResponse()->isSuccessful());
        self::assertJson($client->getResponse()->getContent());

        $jsonResponse = json_decode($client->getResponse()->getContent());
        self::assertEquals('/api/contexts/Locality', $jsonResponse->{'@context'});
        self::assertEquals('/api/localities/1', $jsonResponse->{'@id'});
        self::assertEquals('https://schema.org/addressLocality', $jsonResponse->{'@type'});
        self::assertEquals('1', $jsonResponse->localityId);
        self::assertEquals('Aast', $jsonResponse->name);
        self::assertNotNull($jsonResponse->geometry);
        self::assertNotNull($jsonResponse->geometry->latitude);
        self::assertNotNull($jsonResponse->geometry->longitude);
        self::assertEquals('Point', $jsonResponse->geometry->type);
    }

    /**
     * Delete a locality is not possible.
     */
    public function testDeleteItem()
    {
        $client = static::createClient();
        $client->request('DELETE', '/api/localities/1');
        self::assertFalse($client->getResponse()->isSuccessful());
        self::assertEquals(Response::HTTP_METHOD_NOT_ALLOWED, $client->getResponse()->getStatusCode());
    }

    /**
     * Update a locality is not possible.
     */
    public function testUpdateItem()
    {
        $client = static::createClient();
        $client->request('PUT', '/api/localities/1');
        self::assertFalse($client->getResponse()->isSuccessful());
        self::assertEquals(Response::HTTP_METHOD_NOT_ALLOWED, $client->getResponse()->getStatusCode());
    }

    /**
     * Create a locality is not possible.
     */
    public function testCreateItem()
    {
        $client = static::createClient();
        $client->request('POST', '/api/localities/FR');
        self::assertFalse($client->getResponse()->isSuccessful());
        self::assertEquals(Response::HTTP_METHOD_NOT_ALLOWED, $client->getResponse()->getStatusCode());
    }
}
