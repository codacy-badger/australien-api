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
 * Class to test API on color.
 */
class ColorApiTest extends WebTestCase
{
    /**
     * Get all colors.
     */
    public function testGetCollection()
    {
        $client = static::createClient();
        $client->request('GET', '/api/colors.jsonld');
        self::assertTrue($client->getResponse()->isSuccessful());
        self::assertJson($client->getResponse()->getContent());

        $jsonResponse = json_decode($client->getResponse()->getContent());
        self::assertEquals('/api/contexts/Color', $jsonResponse->{'@context'});
        self::assertEquals('/api/colors', $jsonResponse->{'@id'});
        self::assertEquals('https://schema.org/Thing', $jsonResponse->{'hydra:member'}[0]->{'@type'});
    }

    /**
     * Get all colors.
     */
    public function testGetItem()
    {
        $client = static::createClient();
        $client->request('GET', '/api/colors/1.jsonld');
        self::assertTrue($client->getResponse()->isSuccessful());
        self::assertJson($client->getResponse()->getContent());

        $jsonResponse = json_decode($client->getResponse()->getContent());
        self::assertEquals('/api/contexts/Color', $jsonResponse->{'@context'});
        self::assertEquals('/api/colors/1', $jsonResponse->{'@id'});
        self::assertEquals('https://schema.org/Thing', $jsonResponse->{'@type'});
        self::assertEquals('1', $jsonResponse->colorId);
        self::assertEquals('gris-merle', $jsonResponse->identifier);
        self::assertEquals('Gris Merle', $jsonResponse->name);
    }

    /**
     * Delete a color is not possible.
     */
    public function testDeleteItem()
    {
        $client = static::createClient();
        $client->request('DELETE', '/api/colors/1');
        self::assertFalse($client->getResponse()->isSuccessful());
        self::assertEquals(Response::HTTP_METHOD_NOT_ALLOWED, $client->getResponse()->getStatusCode());
    }

    /**
     * Update a color is not possible.
     */
    public function testUpdateItem()
    {
        $client = static::createClient();
        $client->request('PUT', '/api/colors/1');
        self::assertFalse($client->getResponse()->isSuccessful());
        self::assertEquals(Response::HTTP_METHOD_NOT_ALLOWED, $client->getResponse()->getStatusCode());
    }

    /**
     * Create a color is not possible.
     */
    public function testCreateItem()
    {
        $client = static::createClient();
        $client->request('POST', '/api/colors/1');
        self::assertFalse($client->getResponse()->isSuccessful());
        self::assertEquals(Response::HTTP_METHOD_NOT_ALLOWED, $client->getResponse()->getStatusCode());
    }
}
