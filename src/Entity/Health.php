<?php
/*
 * This file is part of the Berger Australian Application.
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;

/**
 * Health entity.
 */
class Health
{
    /**
     * Health database ID.
     *
     * @var int
     */
    private $healthId;

    /**
     * Health identifier.
     *
     * @var string
     */
    private $identifier;

    /**
     * Maximum to be in good health.
     *
     * @var int
     */
    private $maximum = 0;

    /**
     * Health database ID.
     *
     * @return int
     */
    public function getHealthId(): int
    {
        return $this->healthId;
    }

    /**
     * Health database identifier.
     *
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * Health maximum value before positive test.
     *
     * @return int
     */
    public function getMaximum(): int
    {
        return $this->maximum;
    }

    /**
     * Identifier setter.
     *
     * @param string $identifier
     */
    public function setIdentifier(string $identifier): void
    {
        $this->identifier = $identifier;
    }

    /**
     * Maximum setter.
     *
     * @param int $maximum
     */
    public function setMaximum(int $maximum): void
    {
        $this->maximum = $maximum;
    }
}