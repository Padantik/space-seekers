<?php

declare(strict_types=1);

namespace App\Enum;

enum TemperatureUnit: string
{
    case KELVIN = 'KELVIN';
    case CELSIUS = 'CELSIUS';
    case FAHRENHEIT = 'FAHRENHEIT';

    public function formatTemperature(): string
    {
        return sprintf('°%s', $this->name[0]);
    }
}
