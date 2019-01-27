<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Entity\SendEmail;
use App\Form\SendEmailType;
use App\Manager\ContactManager;
use App\Manager\SendEmailManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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

    /** @var SendEmailManager */
    private $sendEmailManager;

    public function __construct(ContactManager $contactManager, SendEmailManager $sendEmailManager)
    {
        $this->contactManager = $contactManager;
        $this->sendEmailManager = $sendEmailManager;
    }

    /**
     * @Route("/{id}", name="admin_view_mail", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    // Affiche le détail d'un email reçu depuis le formulaire de contact coté client
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
    // Affiche la liste des emails reçus depuis le formulaire de contact coté client
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
    // Supprime un email
    public function DeleteAction(Contact $contact): Response
    {
        $this->contactManager->save($contact);

        return $this->redirectToRoute('admin_mails');
    }

    /**
     * @Route("/compose", name="admin_compose_mail")
     * @param Request $request
     * @return Response
     * @Method({"GET","POST"})
     */
    // Permet d'envoyer un email depuis le back office
    public function composeMailAction(\Swift_Mailer $mailer, Request $request)
    {
        $sendEmail = new SendEmail();
        $form = $this->createForm(SendEmailType::class, $sendEmail);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($sendEmail);
            $em->flush();

            $message = (new \Swift_Message($sendEmail->getSubject()))
                ->setFrom('lc.modeparis@gmail.com')
                ->setTo($sendEmail->getDestinataire())
                ->setBody(

                    $this->renderView(
                        'admin/emails/contact.html.twig',
                        [
                            'sendEmail' => $sendEmail
                        ]),
                    'text/html'
                );

            $mailer->send($message);

            $this->addFlash('success', 'It sent !');

            return $this->redirectToRoute('admin_compose_mail');
        }

        return $this->render('admin/contact/compose.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/sent", name="admin_sent_mails")
     * @param Request $request
     * @return Response
     */
    // Affiche la liste des emails envoyés depuis le back office
    public function sentEmailAction(Request $request): Response
    {
        $sentEmails = $this->sendEmailManager->getList();

        return $this->render('admin/contact/sent.html.twig', [
            "sentEmails" => $sentEmails
        ]);
    }

    /**
     * @Route("/sent/{id}", name="admin_view_sent_mail", requirements={"id"="\d+"})
     * @param $id int
     * @return Response
     */
    // Affiche le detail d'un email envoyé depuis le back office
    public function viewSentEmailAction(int $id): Response
    {
        $sentEmail = $this->sendEmailManager->get($id);

        return $this->render('admin/contact/detail-sent.html.twig', [
            "sentEmail" => $sentEmail
        ]);
    }
}
