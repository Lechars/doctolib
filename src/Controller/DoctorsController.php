<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DoctorsController extends AbstractController
{
    /**
     * @Route("/doctors", name="doctors")
     */
    public function index()
    {
        return $this->render('doctors/index.html.twig', [
            'controller_name' => 'DoctorsController',
        ]);
    }
}
