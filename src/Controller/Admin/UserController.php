<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\UserType;
use App\Manager\UserManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * User controller.
 *
 * @Route("admin/user")
 */
class UserController extends Controller
{
    /** @var UserManager */
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @Route("/{id}", name="admin_view_user", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $user = $this->userManager->get($id);

        return $this->render('admin/user/detail.html.twig', [
            "user" => $user
        ]);
    }

    /**
     * @Route("/", name="admin_users")
     * @param Request $request
     * @return Response
     */
    public function listAction(Request $request): Response
    {
        $users = $this->userManager->getList();

        return $this->render('admin/user/list.html.twig', [
            "users" => $users
        ]);
    }

    /**
     * @Route("/add", name="admin_add_user")
     * @return Response
     * @param Request $request
     */
    public function addAction(Request $request): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->userManager->save($user);

            return $this->redirectToRoute('admin_users');
        }

        return $this->render('admin/user/add.html.twig', [
            "form" => $form->createView(),
            "user" => $user
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_edit_user", requirements={"id"="\d+"})
     */
    public function editAction(int $id, Request $request)
    {
        $user = $this->userManager->get($id);

        //$user->setImage(null);
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->userManager->save($user);

            return $this->redirectToRoute('admin_view_user', [
                "id"=>$user->getId(),
            ]);
        }

        return $this->render('admin/user/edit.html.twig', [
            'form' => $form->createView(),
            'user' => $user
        ]);
    }

    /**
     * @Route("/{id}/delete", name="admin_delete_user", requirements={"id"="\d+"})
     * @return Response
     */
    public function DeleteAction(User $user): Response
    {
        $this->userManager->save($user);

        return $this->redirectToRoute('admin_users');
    }
}
