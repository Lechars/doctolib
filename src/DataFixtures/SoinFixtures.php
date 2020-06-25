<?php

namespace App\DataFixtures;

use App\Entity\Soin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SoinFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $soin =new Soin();
        $soin->setNom('Agrandissement des boobz');
        $soin->setPrix('1000');
        $soin->setDurée_traitement(3);
        $soin->setDurée_hospitalisation(4);

        $manager->persist($soin);
        $soin->setHopital($this->getReference('Boobzpital'));
        $this->addReference('Agrandissement des boobz', $soin);

        $soin =new Soin();
        $soin->setNom('rétrécissement des boobz');
        $soin->setPrix('3000');
        $soin->setDurée_traitement(3);
        $soin->setDurée_hospitalisation(4);

        $manager->persist($soin);
        $soin->setHopital($this->getReference('Boobzpital'));
        $this->addReference('rétrécissement des boobz', $soin);

        $soin =new Soin();
        $soin->setNom('Etre un Apollon');
        $soin->setPrix('4000');
        $soin->setDurée_traitement(3);
        $soin->setDurée_hospitalisation(4);

        $manager->persist($soin);
        $soin->setHopital($this->getReference('Hopital'));
        $this->addReference('Etre un Apollon', $soin);

        $soin =new Soin();
        $soin->setNom('Etre une Apobonne');
        $soin->setPrix('8000');
        $soin->setDurée_traitement(3);
        $soin->setDurée_hospitalisation(4);

        $manager->persist($soin);
        $soin->setHopital($this->getReference('Hopital'));
        $this->addReference('Etre une Apobonne', $soin);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [HopitalFixtures::class];
    }

}
