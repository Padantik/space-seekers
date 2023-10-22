<?php

declare(strict_types=1);

namespace App\Entity\CelestialObject;

use App\Entity\DataClass\BaseSpacialEntity;
use App\Entity\DataClass\StarSpectralType;
use App\Entity\StarSystem;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity]
#[UniqueEntity(
    fields: ['slug', 'starSystem'],
)]
#[ORM\Table(name: 'star')]
class Star extends BaseSpacialEntity
{
    /**
     * @var StarSystem
     */
    #[ORM\OneToOne(targetEntity: StarSystem::class)]
    #[ORM\JoinColumn(name: 'star_system_id', referencedColumnName: 'id')]
    private StarSystem $starSystem;

    /**
     * @var StarSpectralType
     */
    #[ORM\ManyToOne(targetEntity: StarSpectralType::class)]
    #[ORM\JoinColumn(name: 'star_spectral_type_id', referencedColumnName: 'id')]
    private StarSpectralType $starSpectralType;

    /**
     * @var float
     */
    #[ORM\Column(type: Types::FLOAT)]
    private float $luminosity;

    /**
     * @var Collection
     */
    #[ORM\OneToMany(mappedBy: 'planet', targetEntity: Planet::class)]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private Collection $planets;

    public function __construct(
        string $name,
        string $slug,
        float $radius,
        string $mass,
        float $gravity,
        float $effectiveTemperature,
        StarSystem $starSystem,
        int $luminosity,
    ) {
        parent::__construct($name, $slug, $radius, $mass, $gravity, $effectiveTemperature);

        $this->starSystem = $starSystem;
        $this->luminosity = $luminosity;
        $this->planets = new ArrayCollection();
    }

    /**
     * @return StarSystem
     */
    public function getStarSystem(): StarSystem
    {
        return $this->starSystem;
    }

    /**
     * @return float
     */
    public function getLuminosity(): float
    {
        return $this->luminosity;
    }

    /**
     * @return Collection
     */
    public function getPlanets(): Collection
    {
        return $this->planets;
    }

    /**
     * @return StarSpectralType
     */
    public function getStarSpectralType(): StarSpectralType
    {
        return $this->starSpectralType;
    }

    /**
     * @param StarSpectralType $starSpectralType
     */
    public function setStarSpectralType(StarSpectralType $starSpectralType): void
    {
        $this->starSpectralType = $starSpectralType;
    }

    /**
     * @param Planet $planet
     * @return void
     */
    public function addPlanet(Planet $planet): void
    {
        $this->planets->add($planet);
    }

    /**
     * @param Planet $planet
     * @return void
     */
    public function removePlanet(Planet $planet): void
    {
        $this->planets->removeElement($planet);
    }

    /**
     * @return void
     */
    public function clearPlanets(): void
    {
        $this->planets->clear();
    }
}