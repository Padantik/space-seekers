<?php

declare(strict_types=1);

namespace App\Entity\DataClass;

use App\Enum\StarColour;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('star_spectral_type')]
class StarSpectralType extends BaseEntity
{
    /**
     * @var float|null
     */
    #[ORM\Column(type: Types::FLOAT, nullable: true)]
    private ?float $maxTemperature;

    /**
     * @var float
     */
    #[ORM\Column(type: Types::FLOAT)]
    private float $minTemperature;

    /**
     * @var string
     */
    #[ORM\Column(type: Types::STRING)]
    private string $chromaticity;

    /**
     * @var float|null
     */
    #[ORM\Column(type: Types::FLOAT, nullable: true)]
    private ?float $maxLuminosity;

    /**
     * @var float|null
     */
    #[ORM\Column(type: Types::FLOAT, nullable: true)]
    private ?float $minLuminosity;

    public function __construct(
        string $name,
        ?float $maxTemperature,
        float $minTemperature,
        StarColour $chromaticity,
        ?float $maxLuminosity,
        ?float $minLuminosity,
    ) {
        parent::__construct($name, strtolower($name));

        $this->maxTemperature = $maxTemperature;
        $this->minTemperature = $minTemperature;
        $this->chromaticity = $chromaticity->name;
        $this->maxLuminosity = $maxLuminosity;
        $this->minLuminosity = $minLuminosity;
    }

    /**
     * @return float|null
     */
    public function getMaxTemperature(): ?float
    {
        return $this->maxTemperature;
    }

    /**
     * @return float
     */
    public function getMinTemperature(): float
    {
        return $this->minTemperature;
    }

    /**
     * @return string
     */
    public function getChromaticity(): string
    {
        return $this->chromaticity;
    }

    /**
     * @return float|null
     */
    public function getMaxLuminosity(): ?float
    {
        return $this->maxLuminosity;
    }

    /**
     * @return float|null
     */
    public function getMinLuminosity(): ?float
    {
        return $this->minLuminosity;
    }
}