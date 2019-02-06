<?php

namespace App\Controller\Shop;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/shop/dashboard", name="shop_dashboard")
     *
     * @IsGranted("ROLE_BOUTIQUE")
     */
    public function index()
    {
        $this->denyAccessUnlessGranted('ROLE_BOUTIQUE');
        return $this->render('shop/dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}