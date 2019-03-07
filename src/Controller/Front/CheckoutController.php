<?php
/**
 * Created by PhpStorm.
 * User: amandinelesaint
 * Date: 18/02/2019
 * Time: 19:18
 */

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    /**
     * @Route("/checkout", name="checkout")
     */
    public function index()
    {
        return $this->render('front/cart/checkout.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }
}