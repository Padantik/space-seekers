<?php

declare(strict_types=1);

namespace App\Calculator;

final class TemperatureUnitCalculator
{
    private const KELVIN_CONVERSION = 273.15;

    /**
     * @param int|float $kelvin
     * @return int|float
     */
    public function calculateKelvinToCelsius(int|float $kelvin): int|float
    {
        return $kelvin - self::KELVIN_CONVERSION;
    }

    /**
     * @param int|float $kelvin
     * @return int|float
     */
    public function calculateKelvinToFahrenheit(int|float $kelvin): int|float
    {
        return $this->getFahrenheitFormula($kelvin - self::KELVIN_CONVERSION);
    }

    /**
     * @param int|float $celsius
     * @return int|float
     */
    public function calculateCelsiusToKelvin(int|float $celsius): int|float
    {
        return $celsius + self::KELVIN_CONVERSION;
    }

    /**
     * @param int|float $celsius
     * @return int|float
     */
    public function calculateCelsiusToFahrenheit(int|float $celsius): int|float
    {
        return $this->getFahrenheitFormula($celsius);
    }

    /**
     * @param int|float $fahrenheit
     * @return int|float
     */
    public function calculateFahrenheitToKelvin(int|float $fahrenheit): int|float
    {
        return $this->getFahrenheitFormula($fahrenheit, false) + self::KELVIN_CONVERSION;
    }

    /**
     * @param int|float $fahrenheit
     * @return int|float
     */
    public function calculateFahrenheitToCelsius(int|float $fahrenheit): int|float
    {
        return $this->getFahrenheitFormula($fahrenheit, false);
    }

    /**
     * @param int|float $temperatureValue
     * @param bool $multiply
     * @return int|float
     */
    private function getFahrenheitFormula(int|float $temperatureValue, bool $multiply = true): int|float
    {
        if ($multiply) {
            return ($temperatureValue * 9 / 5) + 32;
        }

        return ($temperatureValue - 32) * 5 / 9;
    }
}