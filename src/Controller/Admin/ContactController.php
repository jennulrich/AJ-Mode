<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Manager\ContactManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Contact controller.
 *
 * @Route("admin/mail")
 */
class ContactController extends Controller
{
    /** @var ContactManager */
    private $contactManager;

    public function __construct(ContactManager $contactManager)
    {
        $this->contactManager = $contactManager;
    }

    /**
     * @Route("/{id}", name="admin_view_mail", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    public function viewAction(int $id): Response
    {
        $contact = $this->contactManager->get($id);

        return $this->render('admin/contact/detail.html.twig', [
            "contact" => $contact
        ]);
    }

    /**
     * @Route("/", name="admin_mails")
     * @param Request $request
     * @return Response
     */
    public function listAction(Request $request): Response
    {
        $contacts = $this->contactManager->getList();

        return $this->render('admin/contact/list.html.twig', [
            "contacts" => $contacts
        ]);
    }

    /**
     * @Route("/{id}/delete", name="admin_delete_mail", requirements={"id"="\d+"})
     * @return Response
     */
    public function DeleteAction(Contact $contact): Response
    {
        $this->contactManager->save($contact);

        return $this->redirectToRoute('admin_mails');
    }
}
