<?php

namespace App\Controller\Shop;

use App\Entity\Catalog;
use App\Form\CatalogType;
use App\Manager\CatalogManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;
use Symfony\Component\Security\Core\Security;

/**
 * User controller.
 *
 * @Route("shop/catalog")
 */
class CatalogController extends Controller
{
    /** @var CatalogManager */
    private $catalogManager;

    private $security;

    public function __construct(CatalogManager $catalogManager, Security $security)
    {
        $this->catalogManager = $catalogManager;
        $this->security = $security;
    }

    /**
     * @Route("/{id}", name="shop_view_catalog", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        //$user= $this->container->get('security.context')->getToken()->getUser();

        $catalog = $this->catalogManager->get($id);

        return $this->render('shop/catalog/detail.html.twig', [
            "catalog" => $catalog
        ]);
    }

    /**
     * @Route("/", name="shop_catalogs")
     * @param Request $request
     * @return Response
     */
    public function listAction(Request $request): Response
    {
        $catalogs = $this->catalogManager->getList();

        return $this->render('shop/catalog/list.html.twig', [
            "catalogs" => $catalogs
        ]);

    }

    /**
     * @Route("/add", name="shop_add_catalog")
     * @return Response
     * @param Request $request
     */
    public function addAction(Request $request): Response
    {
        $catalog = new Catalog();

        $user = $this->security->getUser();

        $form = $this->createForm(CatalogType::class, $catalog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->catalogManager->save($catalog);

            return $this->redirectToRoute('shop_catalogs');
        }

        return $this->render('shop/catalog/add.html.twig', [
            "form" => $form->createView(),
            "catalog" => $catalog
        ]);
    }

    /**
     * @Route("/{id}/edit", name="shop_edit_catalog", requirements={"id"="\d+"})
     */
    public function editAction(int $id, Request $request)
    {
        $catalog = $this->catalogManager->get($id);

        //$user->setImage(null);
        $form = $this->createForm(CatalogType::class, $catalog);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->catalogManager->save($catalog);

            return $this->redirectToRoute('shop_view_catalog', [
                "id"=>$catalog->getId(),
            ]);
        }

        return $this->render('shop/catalog/edit.html.twig', [
            'form' => $form->createView(),
            'catalog' => $catalog
        ]);
    }

    /**
     * @Route("/{id}/delete", name="shop_delete_catalog", requirements={"id"="\d+"})
     * @return Response
     */
    public function DeleteAction(Catalog $catalog): Response
    {
        $this->catalogManager->remove($catalog);

        return $this->redirectToRoute('shop_catalogs');
    }
}
