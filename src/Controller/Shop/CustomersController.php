<?php

namespace App\Controller\Shop;

use App\Entity\Customers;
use App\Form\CustomersType;
use App\Manager\CustomersManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Customers controller.
 *
 * @Route("shop/customer")
 */
class CustomersController extends Controller
{
    /** @var CustomersManager */
    private $customersManager;

    public function __construct(CustomersManager $customersManager)
    {
        $this->customersManager = $customersManager;
    }

    /**
     * @Route("/{id}", name="shop_customer", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $customer = $this->customersManager->get($id);

        return $this->render('shop/customers/detail.html.twig', [
            "customer" => $customer
        ]);
    }

    /**
     * @Route("/", name="shop_customers")
     * @return Response
     */
    public function listAction(): Response
    {
        $customers = $this->customersManager->getList();

        return $this->render('shop/customers/list.html.twig', [
            "customers" => $customers,
            //"customer" => $customer
        ]);
    }

    /**
     * @Route("/add", name="shop_add_customer")
     * @return Response
     * @param Request $request
     */
    public function addAction(Request $request): Response
    {
        $customer = new Customers();

        $form = $this->createForm(CustomersType::class, $customer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->customersManager->save($customer);

            return $this->redirectToRoute('shop_customers');
        }

        return $this->render('shop/customers/add.html.twig', [
            "form" => $form->createView(),
            "customer" => $customer
        ]);
    }

    /**
     * @Route("/{id}/edit", name="shop_edit_customer", requirements={"id"="\d+"})
     */
    public function editAction(int $id, Request $request)
    {
        $customer = $this->customersManager->get($id);

        //$user->setImage(null);
        $form = $this->createForm(CustomersType::class, $customer);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->customersManager->save($customer);

            return $this->redirectToRoute('shop_view_customer', [
                "id"=>$customer->getId(),
            ]);
        }

        return $this->render('shop/customers/edit.html.twig', [
            'form' => $form->createView(),
            'customer' => $customer
        ]);
    }

    /**
     * @Route("/{id}/delete", name="shop_delete_customer", requirements={"id"="\d+"})
     * @return Response
     */
    public function DeleteAction(Customers $customers): Response
    {
        $this->customersManager->remove($customers);

        return $this->redirectToRoute('shop_customers');
    }
}
