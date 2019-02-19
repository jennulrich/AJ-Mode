<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/front-login", name="front-login")
     */
    public function index()
    {
        return $this->render('front/login.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }
}