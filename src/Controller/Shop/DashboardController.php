<?php

namespace App\Controller\Shop;

use App\Entity\User;
use App\Manager\UserManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /** @var UserManager */
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @Route("/shop/dashboard", name="shop_dashboard")
     * @IsGranted("ROLE_BOUTIQUE")
     */
    public function index()
    {
        $users = $this->userManager->getList();


        $this->denyAccessUnlessGranted('ROLE_BOUTIQUE');
        return $this->render('shop/dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'users' => $users
        ]);
    }
}