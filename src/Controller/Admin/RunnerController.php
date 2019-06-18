<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RunnerController extends AbstractController
{
    /**
     * @Route("/admin/runner", name="admin_runners")
     */
    public function index()
    {
        return $this->render('admin/runner/list.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
