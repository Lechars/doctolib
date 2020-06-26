<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/")
 */
class HomeController extends AbstractController
{
    /**
     * Home page display
     * @Route("/index",name="home_index", methods={"GET"})
     * @return Response A response instance
     */
    public function index() :Response
    {
        return $this->render('index.html.twig');
    }
}
