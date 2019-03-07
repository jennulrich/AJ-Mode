<?php
/**
 * Created by PhpStorm.
 * User: amandinelesaint
 * Date: 07/03/2019
 * Time: 10:05
 */

namespace App\Controller\Front;

use App\Manager\CatalogManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


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
     * @Route("/{id}", name="front_shop_detail_catalog", requirements={"id"="\d+"})
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