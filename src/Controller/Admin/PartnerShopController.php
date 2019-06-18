<?php

namespace App\Controller\Admin;

use App\Manager\PartnerShopManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * PartnerShop controller.
 *
 * @Route("admin/new-partner")
 */
class PartnerShopController extends Controller
{
    /** @var PartnerShopManager */
    private $partnerShopManager;

    public function __construct(PartnerShopManager $partnerShopManager)
    {
        $this->partnerShopManager = $partnerShopManager;
    }

    /**
     * @Route("/{id}", name="admin_view_new_shop", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $shop = $this->partnerShopManager->get($id);

        return $this->render('admin/shop/suscriber-view.html.twig', [
            "shop" => $shop
        ]);
    }

    /**
     * @Route("/", name="admin_new_shops")
     * @param Request $request
     * @return Response
     */
    public function listAction(Request $request): Response
    {
        $partnerShops = $this->partnerShopManager->getList();

        return $this->render('admin/shop/suscriber-list.html.twig', [
            "partnerShops" => $partnerShops
        ]);
    }
}
