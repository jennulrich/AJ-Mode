<?php

namespace App\Controller\Front;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeuserController extends AbstractController
{
    /**
     * @Route("/home-user", name="home_user")
     *
     * @IsGranted("ROLE_CLIENT")
     */
    public function index()
    {
        return $this->render('front/home-user.html.twig', [
            'controller_name' => 'HomeuserController',
        ]);
    }
}
