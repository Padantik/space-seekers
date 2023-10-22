<?php

declare(strict_types=1);

namespace App\Entity\CelestialObject;

use App\Entity\DataClass\BaseSpacialEntity;
use App\Enum\StateOfMatter;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity]
#[UniqueEntity(fields: ['slug', 'star'])]
#[ORM\Table('planet')]
class Planet extends BaseSpacialEntity
{
    #[ORM\ManyToOne(targetEntity: Planet::class)]
    #[ORM\JoinColumn(name: 'star_id', referencedColumnName: 'id')]
    private Star $star;

    /**
     * @var float
     */
    #[ORM\Column(type: Types::FLOAT)]
    private float $distanceFromStar;

    /**
     * @var float
     */
    #[ORM\Column(type: Types::FLOAT)]
    private float $axialTilt;


    /**
     * @var float
     */
    #[ORM\Column(type: Types::FLOAT)]
    private float $rotationCycle;


    /**
     * @var float
     */
    #[ORM\Column(type: Types::FLOAT)]
    private float $orbitalCycle;


    /**
     * @var string
     */
    #[ORM\Column(type: Types::FLOAT)]
    private string $surfaceMatter;

    public function __construct(
        string $name,
        string $slug,
        float $radius,
        float $mass,
        float $effectiveTemperature,
        float $gravity,
        Star $star,
        float $distanceFromStar,
        float $axialTilt,
        float $rotationCycle,
        float $orbitalCycle,
        StateOfMatter $surfaceMatter,
    ) {
        parent::__construct($name, $slug, $radius, $mass, $effectiveTemperature, $gravity);

        $this->star = $star;
        $this->distanceFromStar = $distanceFromStar;
        $this->axialTilt = $axialTilt;
        $this->rotationCycle = $rotationCycle;
        $this->orbitalCycle = $orbitalCycle;
        $this->surfaceMatter = $surfaceMatter->value;
    }
}