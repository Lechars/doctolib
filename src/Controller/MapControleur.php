<?php

namespace App\Controller;

use App\Entity\Hopital;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;




class MapControleur extends AbstractController
{
    /**
     * @Route("/map")
     */
    public function map():Response
    {
        $hopital = $this->getDoctrine()
            ->getRepository(Hopital::class)
            ->findAll();

        return $this->render('map/map.html.twig',['hopital'=>$hopital]);
    }

    /**
     * @Route("/map/{id}", name="hopitalById")
     */

    public function show(Hopital $hopital): Response
    {
        return $this->render('map/map.html.twig',['hopital'=>$hopital]);
    }

}
