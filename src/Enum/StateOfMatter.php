<?php

declare(strict_types=1);

namespace App\Enum;

enum StateOfMatter: string
{
    case SOLID = 'SOLID';
    case LIQUID = 'LIQUID';
    case GAS = 'GAS';
    case PLASMA = 'PLASMA';

    public function convertToReadable(): string
    {
        return ucfirst(strtolower($this->name));
    }
}
