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
     * @var string
     */
    #[ORM\Column(type: Types::STRING, length: 1)]
    private string $class;

    /**
     * @var int
     */
    #[ORM\Column(type: Types::INTEGER)]
    private int $maxTemperature;

    /**
     * @var int
     */
    #[ORM\Column(type: Types::INTEGER)]
    private int $minTemperature;

    /**
     * @var string
     */
    #[ORM\Column(type: Types::STRING)]
    private string $chromaticity;

    /**
     * @var int
     */
    #[ORM\Column(type: Types::INTEGER)]
    private int $maxLuminosity;

    /**
     * @var int
     */
    #[ORM\Column(type: Types::INTEGER)]
    private int $minLuminosity;

    public function __construct(
        string $name,
        string $slug,
        string $class,
        int $maxTemperature,
        int $minTemperature,
        StarColour $chromaticity,
        int $maxLuminosity,
        int $minLuminosity,
    ) {
        parent::__construct($name, $slug);

        $this->class = $class;
        $this->maxTemperature = $maxTemperature;
        $this->minTemperature = $minTemperature;
        $this->chromaticity = $chromaticity->name;
        $this->maxLuminosity = $maxLuminosity;
        $this->minLuminosity = $minLuminosity;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @return int
     */
    public function getMaxTemperature(): int
    {
        return $this->maxTemperature;
    }

    /**
     * @return int
     */
    public function getMinTemperature(): int
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
     * @return int
     */
    public function getMaxLuminosity(): int
    {
        return $this->maxLuminosity;
    }

    /**
     * @return int
     */
    public function getMinLuminosity(): int
    {
        return $this->minLuminosity;
    }
}