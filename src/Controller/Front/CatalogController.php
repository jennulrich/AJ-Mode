<?php

namespace App\Controller\Front;

use App\Entity\Catalog;
use App\Form\CatalogType;
use App\Manager\CatalogManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * User controller.
 *
 * @Route("shop")
 */
class CatalogController extends Controller
{
    /** @var CatalogManager */
    private $catalogManager;

    public function __construct(CatalogManager $catalogManager)
    {
        $this->catalogManager = $catalogManager;
    }

    /**
     * @Route("/{id}", name="front_shop_view_catalog", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $catalog = $this->catalogManager->get($id);

        return $this->render('front/catalog/detail.html.twig', [
            "catalog" => $catalog
        ]);
    }

    /**
     * @Route("/", name="front_shop_catalogs")
     * @param Request $request
     * @return Response
     */
    public function listAction(Request $request): Response
    {
        $catalogs = $this->catalogManager->getList();

        return $this->render('front/catalog/list.html.twig', [
            "catalogs" => $catalogs
        ]);
    }
}
