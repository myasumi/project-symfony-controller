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
    public function actionContact(Request $request, ObjectManager $manager, MailerInterface $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            //$notification->notify($contact);
            $email = (new Email())
                ->from('miguel.cabello.unas0020160056@gmail.com')
                ->to($contact->getEmail())
                ->subject($contact->getSubject())
                ->text('Message test, hello world');
            $mailer->send($email);


            $manager->persist($contact);
            $manager->flush();
        }
        return $this->render('contact/contact.html.twig', [
            'title' => 'Formulario | Contacto',
            'form' => $form->createView(),
        ]);
    }
}
