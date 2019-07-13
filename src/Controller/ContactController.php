<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="security_contact")
     */
    public function actionFormContact(Request $request, ObjectManager $manager, MailerInterface $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $email = (new Email())
                ->from('miguel.cabello.unas@gmail.com')
                ->to($contact->getEmail())
                ->subject($contact->getSubject())
                ->text($contact->getMessage());
            $mailer->send($email);

            $manager->persist($contact);
            $manager->flush();
            return $this->redirectToRoute('security_contact');
        }
        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
