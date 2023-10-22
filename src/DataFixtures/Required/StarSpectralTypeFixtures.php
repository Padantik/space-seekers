<?php

declare(strict_types=1);

namespace App\DataFixtures\Required;

use App\Entity\DataClass\StarSpectralType;
use App\Enum\StarColour;
use Doctrine\Persistence\ObjectManager;

final class StarSpectralTypeFixtures extends RequiredFixture
{
    /**
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        /**
         * @var StarSpectralType[] $starSpectralTypes
         */
        $starSpectralTypes = [
            new StarSpectralType('O', null, 30000, StarColour::BLUE, null, 30000),
            new StarSpectralType('B', 30000, 10000, StarColour::LIGHT_BLUE, 30000, 25),
            new StarSpectralType('A', 10000, 7500, StarColour::WHITE, 25, 5),
            new StarSpectralType('F', 7500, 6000, StarColour::LIGHT_YELLOW, 5, 1.5),
            new StarSpectralType('G', 6000, 5200, StarColour::YELLOW, 1.5, 0.6),
            new StarSpectralType('K', 5200, 3700, StarColour::ORANGE, 0.6, 0.08),
            new StarSpectralType('M', 3700, 2400, StarColour::ORANGE, 0.08, null),
        ];

        foreach ($starSpectralTypes as $starSpectralType) {
            $manager->persist($starSpectralType);
        }

        $manager->flush();
    }
}
