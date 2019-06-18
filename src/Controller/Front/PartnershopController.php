<?php
/**
 * Created by PhpStorm.
 * User: amandinelesaint
 * Date: 08/03/2019
 * Time: 11:22
 */

namespace App\Controller\Front;

use App\Entity\PartnerShop;
use App\Form\PartnershopType;
use App\Manager\PartnerShopManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PartnershopController extends AbstractController
{
    /** @var PartnerShopManager */
    private $partnerShopManager;

    public function __construct(PartnerShopManager $partnerShopManager)
    {
        $this->partnerShopManager = $partnerShopManager;
    }


    /**
     * @Route("/shop/signup", name="shop-signup")
     * @return Response
     * @param Request $request
     */
    public function index(Request $request): Response
    {
        $partnerShop = new PartnerShop();

        $form = $this->createForm(PartnershopType::class, $partnerShop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->partnerShopManager->save($partnerShop);

            return $this->redirectToRoute('shop-signup');
        }

        return $this->render('front/partner/shop.html.twig', [
            "form" => $form->createView(),
            "partnerShop" => $partnerShop
        ]);
    }
}
