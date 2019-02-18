<?php

namespace App\Controller\Front;

use App\Entity\Product;
use App\Manager\ProductManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Product controller.
 *
 * @Route("front/product")
 */
class ProductController extends Controller
{
    /** @var ProductManager */
    private $productManager;

    public function __construct(ProductManager $productManager)
    {
        $this->productManager = $productManager;
    }

    /**
     * @Route("/{id}", name="view_product", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $product = $this->productManager->get($id);

        return $this->render('front/product/detail.html.twig', [
            "product" => $product
        ]);
    }

    /**
     * @Route("/", name="products")
     * @return Response
     */
    public function listAction(): Response
    {
        $products = $this->productManager->getList();

        return $this->render('front/product/list.html.twig', [
            "products" => $products
        ]);
    }
}