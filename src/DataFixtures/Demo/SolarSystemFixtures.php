<?php

declare(strict_types=1);

namespace App\DataFixtures\Demo;

use App\Entity\CelestialObject\Star;
use App\Entity\StarSystem;
use Doctrine\Persistence\ObjectManager;

final class SolarSystemFixtures extends DemoFixture
{
    /**
     * @var ObjectManager
     */
    private ObjectManager $manager;

    /**
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;

        $starSystem = $this->createStarSystem();
        $star = $this->createStar($starSystem);
    }

    private function createStarSystem(): StarSystem
    {
        $starSystem = new StarSystem('Solar System', 'solar-system',4571000000, 'Our local system of planets.');

        $this->manager->persist($starSystem);
        $this->manager->flush();

        return $starSystem;
    }

    private function createStar(StarSystem $starSystem): void
    {
        $star = new Star('Sun', 'sun', 696340, );
    }
}
