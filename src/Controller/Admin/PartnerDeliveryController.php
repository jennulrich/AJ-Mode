<?php

namespace App\Controller\Admin;

use App\Manager\PartnerDeliveryManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * PartnerShop controller.
 *
 * @Route("admin/new-runner")
 */
class PartnerDeliveryController extends Controller
{
    /** @var PartnerDeliveryManager */
    private $partnerDeliveryManager;

    public function __construct(PartnerDeliveryManager $partnerDeliveryManager)
    {
        $this->partnerDeliveryManager = $partnerDeliveryManager;
    }

    /**
     * @Route("/{id}", name="admin_view_new_runner", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $partnerDelivery = $this->partnerDeliveryManager->get($id);

        return $this->render('admin/runner/suscriber-view.html.twig', [
            "partnerDelivery" => $partnerDelivery
        ]);
    }

    /**
     * @Route("/", name="admin_new_runners")
     * @param Request $request
     * @return Response
     */
    public function listAction(Request $request): Response
    {
        $partnerDeliveries = $this->partnerDeliveryManager->getList();

        return $this->render('admin/runner/suscriber-list.html.twig', [
            "partnerDeliveries" => $partnerDeliveries
        ]);
    }
}
