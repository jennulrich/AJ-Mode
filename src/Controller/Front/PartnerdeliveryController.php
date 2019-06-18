<?php
/**
 * Created by PhpStorm.
 * User: amandinelesaint
 * Date: 08/03/2019
 * Time: 10:53
 */

namespace App\Controller\Front;

use App\Entity\PartnerDelivery;
use App\Form\PartnerdeliveryType;
use App\Manager\PartnerDeliveryManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PartnerdeliveryController extends AbstractController
{
    /** @var PartnerDeliveryManager */
    private $partnerDeliveryManager;

    public function __construct(PartnerDeliveryManager $partnerDeliveryManager)
    {
        $this->partnerDeliveryManager = $partnerDeliveryManager;
    }

    /**
     * @Route("/delivery/signup", name="delivery-signup")
     * @return Response
     * @param Request $request
     */
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $partnerDelivery = new PartnerDelivery();

        $form = $this->createForm(PartnerdeliveryType::class, $partnerDelivery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $partnerDelivery->setPassword(
                $passwordEncoder->encodePassword(
                    $partnerDelivery,
                    $form->get('password')->getData()
                )
            );
            $this->partnerDeliveryManager->save($partnerDelivery);

            return $this->redirectToRoute('delivery-signup');
        }

        return $this->render('front/partner/delivery.html.twig', [
            "form" => $form->createView(),
            "partnerDelivery" => $partnerDelivery
        ]);
    }
}
