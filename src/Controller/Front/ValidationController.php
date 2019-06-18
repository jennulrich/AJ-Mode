<?php

namespace App\Controller\Front;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ValidationController extends AbstractController
{
    /**
     * @Route("/validation", name="validation")
     */
    public function index()
    {
        return $this->render('front/cart/validation.html.twig', [
            'controller_name' => 'ValidationController',
        ]);
    }
}