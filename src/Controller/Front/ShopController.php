<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    /**
     * @Route("/shop", name="shop")
     */
    public function index()
    {
        return $this->render('front/shop.html.twig', [
            'controller_name' => 'ShopController',
        ]);
    }
}
