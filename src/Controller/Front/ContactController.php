<?php

namespace App\Controller\Front;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Manager\ContactManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Contact controller.
 *
 * @Route("contact")
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
     * @Route("/", name="contact")
     * @param Request $request
     * @return Response
     */
    public function indexAction(\Swift_Mailer $mailer, Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $message = (new \Swift_Message($contact->getSubject()))
                ->setFrom($contact->getEmail())
                ->setTo('lc.modeparis@gmail.com')
                ->setBody(
                    $this->renderView(
                        'front/emails/contact.html.twig',
                        [
                            'contact' => $contact,
                        ]),
                    'text/html'

                );

            $mailer->send($message);

            return $this->redirectToRoute('contact');
        }

        return $this->render('front/contact/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
