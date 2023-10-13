<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\SpacialEntityType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpacialEntityTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (SpacialEntityType::DEFAULTS as $spacialEntityTypeName) {
            $spacialEntityType = new SpacialEntityType();
            $spacialEntityType->setName($spacialEntityTypeName);

            $manager->persist($spacialEntityType);
        }

        $manager->flush();
    }
}
