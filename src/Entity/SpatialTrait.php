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

use CrEOF\Spatial\PHP\Types\Geometry\GeometryInterface;

/**
 * Trait Geometry.
 */
trait SpatialTrait
{
    /**
     * The geometry point or zone.
     *
     * @var SpatialInterface
     */
    private $geometry;

    /**
     * Get the geometry of location.
     *
     * @return SpatialInterface|null
     */
    public function getGeometry(): ?GeometryInterface
    {
        return $this->geometry;
    }

    /**
     * Set the geometry of location.
     *
     * @param SpatialInterface $geometryType
     */
    public function setGeometry(GeometryInterface $geometryType): void
    {
        $this->geometry = $geometryType;
    }
}
