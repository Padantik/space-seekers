<?php

declare(strict_types=1);

namespace App\Entity\DataClass;

use App\Enum\StateOfMatter;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity]
#[ORM\Table('element')]
class Element extends BaseEntity
{
    /**
     * @var int
     */
    #[ORM\Column(type: Types::INTEGER, unique: true)]
    private int $atomicNumber;

    /**
     * @var string
     */
    #[ORM\Column(type: Types::STRING, unique: true)]
    private string $symbol;

    /**
     * @var string
     */
    #[ORM\Column(type: Types::STRING)]
    private string $phaseAtSTP;

    public function __construct(
        string $name,
        string $slug,
        int $atomicNumber,
        string $symbol,
        StateOfMatter $phaseAtSTP,
    ) {
        parent::__construct($name, $slug);

        $this->atomicNumber = $atomicNumber;
        $this->symbol = $symbol;
        $this->phaseAtSTP = $phaseAtSTP->name;
    }

    /**
     * @return int
     */
    public function getAtomicNumber(): int
    {
        return $this->atomicNumber;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @return string
     */
    public function getPhaseAtSTP(): string
    {
        return $this->phaseAtSTP;
    }
}