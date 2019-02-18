<?php

namespace App\Controller\Front;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DetailproductController extends AbstractController
{
    /**
     * @Route("/detail-product", name="detail-product")
     */
    public function index()
    {
        return $this->render('front/detail-product.html.twig', [
            'controller_name' => 'DetailproductController',
        ]);
    }
}