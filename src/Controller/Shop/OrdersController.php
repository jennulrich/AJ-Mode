<?php

namespace App\Controller\Shop;

use App\Entity\Orders;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Order controller.
 *
 * @Route("shop/order")
 */
class OrdersController extends Controller
{
    /**
     * @Route("/", name="shop_orders")
     * @param Request $request
     * @return Response
     */
    public function listAction(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $orders = $em->getRepository(Orders::class)
            ->findAll();

        return $this->render('shop/order/list.html.twig', [
            'orders' => $orders
        ]);
    }
}
