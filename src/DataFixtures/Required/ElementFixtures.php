<?php

declare(strict_types=1);

namespace App\DataFixtures\Required;

use App\Entity\DataClass\Element;
use App\Enum\StateOfMatter;
use Doctrine\Persistence\ObjectManager;

final class ElementFixtures extends RequiredFixture
{
    /**
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        /**
         * @var Element[] $baseElements
         */
        $baseElements = [
            new Element('Hydrogen', 1, 'H', StateOfMatter::GAS),
            new Element('Helium', 2, 'He', StateOfMatter::GAS),
            new Element('Lithium', 3, 'Li', StateOfMatter::SOLID),
            new Element('Beryllium', 4, 'Be', StateOfMatter::SOLID),
            new Element('Boron', 5, 'B', StateOfMatter::SOLID),
            new Element('Carbon', 6, 'C', StateOfMatter::SOLID),
            new Element('Nitrogen',7, 'N', StateOfMatter::GAS),
            new Element('Oxygen', 8, 'O', StateOfMatter::GAS),
            new Element('Fluorine', 9, 'F', StateOfMatter::GAS),
            new Element('Neon', 10, 'Ne', StateOfMatter::GAS),
            new Element('Sodium', 11, 'Na', StateOfMatter::SOLID),
            new Element('Magnesium', 12, 'Mg', StateOfMatter::SOLID),
            new Element('Aluminium', 13, 'Al', StateOfMatter::SOLID),
            new Element('Silicon', 14, 'Si', StateOfMatter::SOLID),
            new Element('Phosphorus', 15, 'P', StateOfMatter::SOLID),
            new Element('Sulphur', 16, 'S', StateOfMatter::SOLID),
            new Element('Chlorine', 17, 'Cl', StateOfMatter::GAS),
            new Element('Argon', 18, 'Ar', StateOfMatter::GAS),
        ];

        foreach ($baseElements as $baseElement) {
            $manager->persist($baseElement);
        }

        $manager->flush();
    }
}
