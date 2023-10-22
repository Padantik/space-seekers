<?php

declare(strict_types=1);

namespace App\Controller;

use App\Calculator\GeometryCalculator;
use App\Enum\TemperatureUnit;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanetarySystemController extends AbstractSpacialController
{
    public float $id = 1;

    public function index(Request $request): Response
    {
        $temperatureUnit = TemperatureUnit::CELSIUS->formatTemperature();

        dd(new GeometryCalculator(6371));
//        $temperature = $this->temperatureUnitCalculator->calculateKelvinToCelsius(11);

//        dd(sprintf('%d %s', $temperature, $temperatureUnit));
    }
}