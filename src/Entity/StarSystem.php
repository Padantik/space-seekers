<?php

declare(strict_types=1);

namespace App\Entity;

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
     * @var int
     */
    #[ORM\Column(type: Types::BIGINT)]
    private int $age;

    /**
     * @var string
     */
    #[ORM\Column(type: Types::TEXT)]
    private string $description;

    /**
     * @param string $name
     * @param string $slug
     * @param int $age
     * @param string $description
     */
    public function __construct(
      string $name,
      string $slug,
      int $age,
      string $description
    ) {
        parent::__construct($name, $slug);

        $this->age = $age;
        $this->description = $description;
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