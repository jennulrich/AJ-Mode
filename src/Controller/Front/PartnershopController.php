<?php
/**
 * Created by PhpStorm.
 * User: amandinelesaint
 * Date: 08/03/2019
 * Time: 11:22
 */

namespace App\Controller\Front;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PartnershopController extends AbstractController
{
    /**
     * @Route("/shop/signup", name="shop-signup")
     */
    public function index()
    {
        return $this->render('front/partner/shop.html.twig', [
            'controller_name' => 'PartnershopController',
        ]);
    }
}