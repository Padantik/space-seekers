<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\CelestialObject\Star;
use App\Entity\DataClass\BaseEntity;
use App\Repository\StarSystemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StarSystemRepository::class)]
#[ORM\Table(name: 'star_system')]
class StarSystem extends BaseEntity
{
    /**
     * {@inheritdoc}
     */
    #[ORM\Column(type: Types::STRING, length: 255, unique: true)]
    protected string $slug;

    /**
     * @var Star
     */
    #[ORM\OneToOne(targetEntity: Star::class)]
    #[ORM\JoinColumn(name: 'star_id', referencedColumnName: 'id')]
    private Star $star;

    /**
     * @var int
     */
    #[ORM\Column(type: Types::INTEGER)]
    private int $age;

    /**
     * @var string
     */
    #[ORM\Column(type: Types::TEXT)]
    private string $description;

    public function __construct(
      string $name,
      string $slug,
      Star $star,
      int $age,
      string $description
    ) {
        parent::__construct($name, $slug);

        $this->star = $star;
        $this->age = $age;
        $this->description = $description;
    }

    /**
     * @return Star
     */
    public function getStar(): Star
    {
        return $this->star;
    }

    /**
     * @param Star $star
     */
    public function setStar(Star $star): void
    {
        $this->star = $star;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}