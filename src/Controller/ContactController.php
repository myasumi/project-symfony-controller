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
        //En esta parte la funcion esta realizando la creacion del formulario [contacto]
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

    //crear la funcion de enviar una notificacion de docente al administrador de igual manera de alumno al administracion
    
    //hola 








}
