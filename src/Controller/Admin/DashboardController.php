<?php

namespace App\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/admin/dashboard", name="dashboard")
     *
     * @IsGranted("ROLE_ADMIN")
     */
    public function index()
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/dashboard/home.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
