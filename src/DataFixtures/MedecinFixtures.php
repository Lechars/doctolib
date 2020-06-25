<?php

namespace App\DataFixtures;

use App\Entity\Medecin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MedecinFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $medecin = new Medecin();
        $medecin->setNom('House');
        $medecin->setTel('0678765689');

        $manager->persist($medecin);
        $medecin->setSoin($this->getReference('Etre un Apollon'));

        $medecin = new Medecin();
        $medecin->setNom('Grey');
        $medecin->setTel('0678765687');

        $manager->persist($medecin);
        $medecin->setSoin($this->getReference('Agrandissement des boobz'));


        $manager->flush();
    }

    public function getDependencies()
    {
        return [SoinFixtures::class];
    }
}
