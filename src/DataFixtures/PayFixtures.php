<?php

namespace App\DataFixtures;

use App\Entity\Pay;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PayFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $pay =new Pay();
        $pay->setName('Bresil');
        $manager->persist($pay);
        $this->addReference('Bresil', $pay);

        $pay =new Pay();
        $pay->setName('Thailande');
        $manager->persist($pay);
        $this->addReference('Thailande', $pay);

        $manager->flush();
    }
}
