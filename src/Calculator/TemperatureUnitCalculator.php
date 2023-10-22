<?php

declare(strict_types=1);

namespace App\Calculator;

use App\Enum\TemperatureUnit;

final class TemperatureUnitCalculator
{
    private const KELVIN_CONVERSION = 273.15;

    /**
     * @var float
     */
    public float $inKelvin;

    /**
     * @var float
     */
    public float $inCelsius;

    /**
     * @var float
     */
    public float $inFahrenheit;

    /**
     * @param float $temperature
     * @param TemperatureUnit $temperatureUnit
     */
    public function __construct(
        float $temperature,
        TemperatureUnit $temperatureUnit = TemperatureUnit::KELVIN,
    ) {
        switch ($temperatureUnit) {
            case TemperatureUnit::CELSIUS:
                $this->inKelvin = $this->calculateCelsiusToKelvin($temperature);
                $this->inCelsius = $temperature;
                $this->inFahrenheit = $this->calculateCelsiusToFahrenheit($temperature);
                break;
            case TemperatureUnit::FAHRENHEIT:
                $this->inKelvin = $this->calculateFahrenheitToKelvin($temperature);
                $this->inCelsius = $this->calculateFahrenheitToCelsius($temperature);
                $this->inFahrenheit = $temperature;
                break;
            default:
                $this->inKelvin = $temperature;
                $this->inCelsius = $this->calculateKelvinToCelsius($temperature);
                $this->inFahrenheit = $this->calculateKelvinToFahrenheit($temperature);
                break;
        }
    }

    /**
     * @param float $kelvin
     * @return float
     */
    private function calculateKelvinToCelsius(float $kelvin): float
    {
        return $kelvin - self::KELVIN_CONVERSION;
    }

    /**
     * @param float $kelvin
     * @return float
     */
    private function calculateKelvinToFahrenheit(float $kelvin): float
    {
        return $this->getFahrenheitFormula($kelvin - self::KELVIN_CONVERSION);
    }

    /**
     * @param float $celsius
     * @return float
     */
    private function calculateCelsiusToKelvin(float $celsius): float
    {
        return $celsius + self::KELVIN_CONVERSION;
    }

    /**
     * @param float $celsius
     * @return float
     */
    private function calculateCelsiusToFahrenheit(float $celsius): float
    {
        return $this->getFahrenheitFormula($celsius);
    }

    /**
     * @param float $fahrenheit
     * @return float
     */
    private function calculateFahrenheitToKelvin(float $fahrenheit): float
    {
        return $this->getFahrenheitFormula($fahrenheit, false) + self::KELVIN_CONVERSION;
    }

    /**
     * @param float $fahrenheit
     * @return float
     */
    private function calculateFahrenheitToCelsius(float $fahrenheit): float
    {
        return $this->getFahrenheitFormula($fahrenheit, false);
    }

    /**
     * @param float $temperatureValue
     * @param bool $multiply
     * @return float
     */
    private function getFahrenheitFormula(float $temperatureValue, bool $multiply = true): float
    {
        if ($multiply) {
            return ($temperatureValue * 9 / 5) + 32;
        }

        return ($temperatureValue - 32) * 5 / 9;
    }
}