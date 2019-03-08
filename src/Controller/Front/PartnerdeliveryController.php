<?php
/**
 * Created by PhpStorm.
 * User: amandinelesaint
 * Date: 08/03/2019
 * Time: 10:53
 */

namespace App\Controller\Front;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PartnerdeliveryController extends AbstractController
{
    /**
     * @Route("/delivery/signup", name="delivery-signup")
     */
    public function index()
    {
        return $this->render('front/partner/delivery.html.twig', [
            'controller_name' => 'PartnerdeliveryController',
        ]);
    }
}