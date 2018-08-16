<?php
/*
 * This file is part of the Berger Australian Application.
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Entity;

use App\Entity\Color;
use PHPUnit\Framework\TestCase;

class ColorTest extends TestCase
{
    /**
     * Entity to test.
     *
     * @var Color
     */
    private $color;

    /**
     * Initialize color befor each test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->color = new Color();
    }

    /**
     * Test the method constructor.
     */
    public function testConstructor()
    {
        self::assertFalse($this->color->isBlack());
        self::assertFalse($this->color->isMerle());
        self::assertFalse($this->color->isRed());
    }

    /**
     * Test the method GetName.
     */
    public function testGetName()
    {
        $name = 'name';
        $this->color->setName($name);
        self::assertEquals($name, $this->color->getName());
    }

    /**
     * Test the method GetIdentifier.
     */
    public function testGetIdentifier()
    {
        $identifier = 'identifier';
        $this->color->setIdentifier($identifier);
        self::assertEquals($identifier, $this->color->getIdentifier());
    }

    /**
     * Test the method IsMerle.
     */
    public function testIsMerle()
    {
        $this->color->setMerle(true);
        self::assertTrue($this->color->isMerle());
        $this->color->setMerle(false);
        self::assertFalse($this->color->isMerle());
    }

    /**
     * Test the method IsRed.
     */
    public function testIsRed()
    {
        $this->color->setRed(true);
        self::assertTrue($this->color->isRed());
        $this->color->setRed(false);
        self::assertFalse($this->color->isRed());
    }

    /**
     * Test the method IsBlack.
     */
    public function testIsBlack()
    {
        $this->color->setBlack(true);
        self::assertTrue($this->color->isBlack());
        $this->color->setBlack(false);
        self::assertFalse($this->color->isBlack());
    }
}
