<?php

namespace App\DataFixtures;

use App\Entity\Hopital;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class HopitalFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $hopital = new hopital();
        $hopital->setNom('Boobzpital');
        $hopital->setAdresse('2 rue du fail');
        $hopital->setGps('96.9811928,13.0001089');
        $hopital->setTarif(50);

        $manager->persist($hopital);
        $hopital->setPay($this->getReference('Bresil'));
        $this->addReference('Boobzpital', $hopital);

        $hopital = new hopital();
        $hopital->setNom('Hopital');
        $hopital->setAdresse('2 rue du scalpel');
        $hopital->setGps('-69.6959022,-13.6589198');
        $hopital->setTarif(50);

        $manager->persist($hopital);
        $hopital->setPay($this->getReference('Thailande'));
        $this->addReference('Boobzpital', $hopital);

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [PayFixtures::class];
    }
}
