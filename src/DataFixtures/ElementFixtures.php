<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\DataClass\Element;
use App\Enum\StateOfMatter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class ElementFixtures extends Fixture
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
            new Element('Hydrogen', 'hydrogen', 1, 'H', StateOfMatter::GAS),
            new Element('Helium', 'helium', 2, 'He', StateOfMatter::GAS),
            new Element('Lithium', 'lithium', 3, 'Li', StateOfMatter::SOLID),
            new Element('Beryllium', 'beryllium', 4, 'Be', StateOfMatter::SOLID),
            new Element('Boron', 'boron', 5, 'B', StateOfMatter::SOLID),
            new Element('Carbon', 'carbon', 6, 'C', StateOfMatter::SOLID),
            new Element('Nitrogen', 'nitrogen', 7, 'N', StateOfMatter::GAS),
            new Element('Oxygen', 'oxygen', 8, 'O', StateOfMatter::GAS),
            new Element('Fluorine', 'fluorine', 9, 'F', StateOfMatter::GAS),
            new Element('Neon', 'neon', 10, 'Ne', StateOfMatter::GAS),
            new Element('Sodium', 'sodium', 11, 'Na', StateOfMatter::SOLID),
            new Element('Magnesium', 'magnesium', 12, 'Mg', StateOfMatter::SOLID),
            new Element('Aluminium', 'aluminium', 13, 'Al', StateOfMatter::SOLID),
            new Element('Silicon', 'silicon', 14, 'Si', StateOfMatter::SOLID),
            new Element('Phosphorus', 'phosphorus', 15, 'P', StateOfMatter::SOLID),
            new Element('Sulphur', 'sulphur', 16, 'S', StateOfMatter::SOLID),
            new Element('Chlorine', 'chlorine', 17, 'Cl', StateOfMatter::GAS),
            new Element('Argon', 'argon', 18, 'Ar', StateOfMatter::GAS),
        ];

        foreach ($baseElements as $baseElement) {
            $manager->persist($baseElement);
        }

        $manager->flush();
    }
}
