<?php

declare(strict_types=1);

namespace App\Calculator;

class SurfaceAreaCalculator
{
    public function calculate(int $radius): int
    {
        return (4 * pi()) * ($radius ** 2);
    }
}