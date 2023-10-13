<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table(name: 'spacial_entity_type')]
class SpacialEntityType
{
    const STAR = 'star';
    const PLANET = 'planet';
    const SATELLITE = 'satellite';

    const ALL = [self::STAR, self::PLANET, self::SATELLITE];

    /**
     * @var int
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    /**
     * @var string
     */
    #[ORM\Column(length: 255, unique: true)]
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}