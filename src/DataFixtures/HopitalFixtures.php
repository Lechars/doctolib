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
        $hopital->setNom('Hospital');
        $hopital->setAdresse('2 rue du scalpel');
        $hopital->setGps('-69.6959022,-13.6589198');
        $hopital->setTarif(50);

        $manager->persist($hopital);
        $hopital->setPay($this->getReference('Thailande'));
        $this->addReference('Hospital', $hopital);

        $hopital = new hopital();
        $hopital->setNom('Clinique');
        $hopital->setAdresse('2 rue du bistouri');
        $hopital->setGps(' -77.0403,21.00');
        $hopital->setTarif(50);

        $manager->persist($hopital);
        $hopital->setPay($this->getReference('Thailande'));
        $this->addReference('Clinique', $hopital);

        $hopital = new hopital();
        $hopital->setNom('Beauty Hospital');
        $hopital->setAdresse('2 rue du prank');
        $hopital->setGps('-3.1190275,-60.0217314');
        $hopital->setTarif(50);

        $manager->persist($hopital);
        $hopital->setPay($this->getReference('Bresil'));
        $this->addReference('Beauty Hospital', $hopital);

        $hopital = new hopital();
        $hopital->setNom('BoobzBuz');
        $hopital->setAdresse('2 rue du joke');
        $hopital->setGps('127.122630,40.566');
        $hopital->setTarif(50);

        $manager->persist($hopital);
        $hopital->setPay($this->getReference('Thailande'));
        $this->addReference('BoobzBuz', $hopital);

        $hopital = new hopital();
        $hopital->setNom('NotThatUglyBut...');
        $hopital->setAdresse('2 rue du joke');
        $hopital->setGps('-45.290278,63.614594');
        $hopital->setTarif(50);

        $manager->persist($hopital);
        $hopital->setPay($this->getReference('Thailande'));
        $this->addReference('NotThatUglyBut...', $hopital);

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
