<?php

declare(strict_types=1);

namespace App\Entity\Interfaces;

use App\Entity\SpacialEntityType;

interface SpacialEntityInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $string
     * @return void
     */
    public function setName(string $string): void;

    /**
     * @return SpacialEntityType
     */
    public function getEntityType(): SpacialEntityType;

    /**
     * @param SpacialEntityType $entityType
     * @return void
     */
    public function setEntityType(SpacialEntityType $entityType): void;

    /**
     * @return int
     */
    public function getRadius(): int;

    /**
     * @param int $radius
     * @return void
     */
    public function setRadius(int $radius): void;

    /**
     * @return int
     */
    public function getMass(): int;

    /**
     * @param int $mass
     * @return void
     */
    public function setMass(int $mass): void;
}