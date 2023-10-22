<?php

declare(strict_types=1);

namespace App\Entity\DataClass;

use App\Enum\TemperatureUnit;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @var float
     */
    #[ORM\Column(type: Types::FLOAT, length: 255)]
    protected float $mass;

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
     * @var Collection
     */
    #[ORM\ManyToMany(targetEntity: Element::class)]
    protected Collection $elementalComposition;

    public function __construct(
        string $name,
        string $slug,
        float $radius,
        float $mass,
        float $effectiveTemperature,
        float $gravity,
    ) {
        parent::__construct($name, $slug);

        $this->radius = $radius;
        $this->mass = $mass;
        $this->gravity = $gravity;
        $this->effectiveTemperature = $effectiveTemperature;
        $this->elementalComposition = new ArrayCollection();
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
     * @return float
     */
    public function getMass(): float
    {
        return $this->mass;
    }

    /**
     * @param float $mass
     * @return void
     */
    public function setMass(float $mass): void
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
     * @return Collection
     */
    public function getElementalComposition(): Collection
    {
        return $this->elementalComposition;
    }

    /**
     * @return float
     */
    public function getEffectiveTemperature(): float
    {
        return $this->effectiveTemperature;
    }

    /**
     * @param Element $element
     */
    public function addElement(Element $element): void
    {
        $this->elementalComposition->add($element);
    }

    /**
     * @param Element $element
     */
    public function removeElement(Element $element): void
    {
        $this->elementalComposition->removeElement($element);
    }

    /**
     * @return void
     */
    public function clearElements(): void
    {
        $this->elementalComposition->clear();
    }
}