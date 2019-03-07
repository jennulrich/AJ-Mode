<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StripeController extends AbstractController
{
    /**
     * @Route("/stripe", name="stripe")
     */
    public function index()
    {
        \Stripe\Stripe::setApiKey("sk_test_mQrXG6n5zvmHppSnMcRgKAaq");

        \Stripe\Charge::create([
            "amount" => 2000,
            "currency" => "eur",
            //"source" => $request->request->get('stripeToken'), // obtained with Stripe.js
            "source" => 'tok_mastercard', // obtained with Stripe.js
            "description" => "Paiement de test LC Mode"
        ], [
            "idempotency_key" => "buG5xdrrcRPMGxju",]
        );


        return $this->render('front/stripe.html.twig', [
            'controller_name' => 'StripeController',
        ]);
    }
}