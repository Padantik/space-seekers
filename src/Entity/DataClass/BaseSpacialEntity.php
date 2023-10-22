<?php

declare(strict_types=1);

namespace App\Entity\DataClass;

use App\Enum\TemperatureUnit;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\MappedSuperclass]
abstract class BaseSpacialEntity extends BaseEntity
{
    protected const DEFAULT_GRAVITATIONAL_UNIT = 'm/s²';
    protected const DEFAULT_TEMPERATURE_UNIT = TemperatureUnit::KELVIN;

    /**
     * @var float
     */
    #[ORM\Column(type: Types::FLOAT, length: 255)]
    protected float $radius;

    /**
     * @var string
     */
    #[ORM\Column(type: Types::STRING, length: 255)]
    protected string $mass;

    /**
     * @var float
     */
    #[ORM\Column(type: Types::FLOAT, length: 255)]
    protected float $gravity;

    /**
     * @var float
     */
    #[ORM\Column(type: Types::FLOAT)]
    protected float $effectiveTemperature;

    /**
     * {@inheritDoc}
     * @param float $radius
     * @param string $mass
     * @param float $effectiveTemperature
     * @param float $gravity
     */
    public function __construct(
        string $name,
        string $slug,
        float $radius,
        string $mass,
        float $effectiveTemperature,
        float $gravity,
    ) {
        parent::__construct($name, $slug);

        $this->radius = $radius;
        $this->mass = $mass;
        $this->gravity = $gravity;
        $this->effectiveTemperature = $effectiveTemperature;
    }

    /**
     * @return float
     */
    public function getRadius(): float
    {
        return $this->radius;
    }

    /**
     * @param float $radius
     * @return void
     */
    public function setRadius(float $radius): float
    {
        $this->radius = $radius;
    }

    /**
     * @return string
     */
    public function getMass(): string
    {
        return $this->mass;
    }

    /**
     * @param string $mass
     * @return void
     */
    public function setMass(string $mass): void
    {
        $this->mass = $mass;
    }

    /**
     * @return float
     */
    public function getGravity(): float
    {
        return $this->gravity;
    }

    /**
     * @param float $gravity
     */
    public function setGravity(float $gravity): void
    {
        $this->gravity = $gravity;
    }

    /**
     * @return float
     */
    public function getEffectiveTemperature(): float
    {
        return $this->effectiveTemperature;
    }
}