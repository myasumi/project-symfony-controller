<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="security_home")
     */
    public function index()
    {
        //Esta el controlador de la vista pricipal del proyecto
        return $this->render('home/home.html.twig');
    }
}
