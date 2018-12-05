<?php

namespace App\Controller\Admin;

use App\Entity\Shop;
use App\Form\ShopType;
use App\Manager\ShopManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Shop controller.
 *
 * @Route("admin/shop")
 */
class ShopController extends Controller
{
    /** @var ShopManager */
    private $shopManager;

    public function __construct(ShopManager $shopManager)
    {
        $this->shopManager = $shopManager;
    }

    /**
     * @Route("/{id}", name="admin_view_shop", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $shop = $this->shopManager->get($id);

        return $this->render('admin/shop/detail.html.twig', [
            "shop" => $shop
        ]);
    }

    /**
     * @Route("/", name="admin_shops")
     * @param Request $request
     * @return Response
     */
    public function listAction(Request $request): Response
    {
        $shops = $this->shopManager->getList();

        return $this->render('admin/shop/list.html.twig', [
            "shops" => $shops
        ]);
    }

    /**
     * @Route("/add", name="admin_add_shop")
     * @return Response
     * @param Request $request
     */
    public function addAction(Request $request): Response
    {
        $shop = new Shop();

        $form = $this->createForm(ShopType::class, $shop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->shopManager->save($shop);

            return $this->redirectToRoute('admin_shops');
        }

        return $this->render('admin/shop/add.html.twig', [
            "form" => $form->createView(),
            "shop" => $shop
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_edit_shop", requirements={"id"="\d+"})
     */
    public function editAction(int $id, Request $request)
    {
        $shop = $this->shopManager->get($id);

        //$user->setImage(null);
        $form = $this->createForm(ShopType::class, $shop);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->shopManager->save($shop);

            return $this->redirectToRoute('admin_view_shop', [
                "id"=>$shop->getId(),
            ]);
        }

        return $this->render('admin/shop/edit.html.twig', [
            'form' => $form->createView(),
            'shop' => $shop
        ]);
    }

    /**
     * @Route("/{id}/delete", name="admin_delete_shop", requirements={"id"="\d+"})
     * @return Response
     */
    public function DeleteAction(Shop $shop): Response
    {
        $this->shopManager->save($shop);

        return $this->redirectToRoute('admin_shops');
    }
}
