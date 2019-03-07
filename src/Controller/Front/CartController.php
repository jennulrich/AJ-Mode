<?php
/**
 * Created by PhpStorm.
 * User: amandinelesaint
 * Date: 18/02/2019
 * Time: 18:33
 */

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index()
    {
        return $this->render('front/cart/cart.html.twig', [
            'controller_name' => 'CartController',
        ]);
    }
}