<?php
/**
 * Created by PhpStorm.
 * User: amandinelesaint
 * Date: 05/02/2019
 * Time: 16:59
 */

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AboutusController extends AbstractController
{
    /**
     * @Route("/about-us", name="aboutus")
     */
    public function index()
    {
        return $this->render('front/about/aboutus.html.twig', [
            'controller_name' => 'AboutusController',
        ]);
    }
}
