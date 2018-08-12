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
 * Interface Geolocation.
 */
interface SpatialInterface
{
    /**
     * Get the geometry of location.
     *
     * @return GeometryInterface
     */
    public function getGeometry(): ?GeometryInterface;

    /**
     * Set the geometry of location.
     *
     * @param GeometryInterface $geometryType
     */
    public function setGeometry(GeometryInterface $geometryType): void;
}
