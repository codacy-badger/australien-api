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
 * Class to test API on health.
 */
class HealthApiTest extends WebTestCase
{
    /**
     * Get all healths.
     */
    public function testGetCollection()
    {
        $client = static::createClient();
        $client->request('GET', '/api/healths.jsonld');
        self::assertTrue($client->getResponse()->isSuccessful());
        self::assertJson($client->getResponse()->getContent());

        $jsonResponse = json_decode($client->getResponse()->getContent());
        self::assertEquals('/api/contexts/Health', $jsonResponse->{'@context'});
        self::assertEquals('/api/healths', $jsonResponse->{'@id'});
        self::assertEquals('https://schema.org/Thing', $jsonResponse->{'hydra:member'}[0]->{'@type'});
    }

    /**
     * Get all healths.
     */
    public function testGetItem()
    {
        $client = static::createClient();
        $client->request('GET', '/api/healths/1.jsonld');
        self::assertTrue($client->getResponse()->isSuccessful());
        self::assertJson($client->getResponse()->getContent());

        $jsonResponse = json_decode($client->getResponse()->getContent());
        self::assertEquals('/api/contexts/Health', $jsonResponse->{'@context'});
        self::assertEquals('/api/healths/1', $jsonResponse->{'@id'});
        self::assertEquals('https://schema.org/Thing', $jsonResponse->{'@type'});
        self::assertEquals('1', $jsonResponse->healthId);
        self::assertEquals('MDR1', $jsonResponse->identifier);
    }

    /**
     * Delete a health is not possible.
     */
    public function testDeleteItem()
    {
        $client = static::createClient();
        $client->request('DELETE', '/api/healths/1');
        self::assertFalse($client->getResponse()->isSuccessful());
        self::assertEquals(Response::HTTP_METHOD_NOT_ALLOWED, $client->getResponse()->getStatusCode());
    }

    /**
     * Update a health is not possible.
     */
    public function testUpdateItem()
    {
        $client = static::createClient();
        $client->request('PUT', '/api/healths/1');
        self::assertFalse($client->getResponse()->isSuccessful());
        self::assertEquals(Response::HTTP_METHOD_NOT_ALLOWED, $client->getResponse()->getStatusCode());
    }

    /**
     * Create a health is not possible.
     */
    public function testCreateItem()
    {
        $client = static::createClient();
        $client->request('POST', '/api/healths/1');
        self::assertFalse($client->getResponse()->isSuccessful());
        self::assertEquals(Response::HTTP_METHOD_NOT_ALLOWED, $client->getResponse()->getStatusCode());
    }
}
