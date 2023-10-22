<?php

declare(strict_types=1);

namespace App\Calculator;

final class GeometryCalculator
{
    /**
     * @var float
     */
    private float $radius;

    /**
     * @var float
     */
    private float $diameter;

    /**
     * @var float
     */
    private float $circumference;

    /**
     * @var float
     */
    private float $area;

    /**
     * @param float $radius
     */
    public function __construct(
        float $radius,
    ) {
        $this->radius = $radius;
        $this->diameter = $this->calculateDiameter($radius);
        $this->circumference = $this->calculateCircumference($radius);
        $this->area = $this->calculateArea($radius);
    }

    /**
     * @return float
     */
    public function getFormattedRadius(): float
    {
        return $this->radius;
    }

    /**
     * @return float
     */
    public function getFormattedDiameter(): float
    {
        return $this->diameter;
    }

    /**
     * @return float
     */
    public function getFormattedCircumference(): float
    {
        return $this->circumference;
    }

    /**
     * @return float
     */
    public function getFormattedArea(): float
    {
        return $this->area;
    }

    /**
     * @param float $radius
     * @return float
     */
    private function calculateDiameter(float $radius): float
    {
        return round($radius * 2, 2);
    }

    /**
     * @param float $radius
     * @return float
     */
    private function calculateCircumference(float $radius): float
    {
        return round(2 * pi() * $radius, 2);
    }

    /**
     * @param float $radius
     * @return float
     */
    private function calculateArea(float $radius): float
    {
        return round((4 * pi()) * ($radius ** 2), 2);
    }
}