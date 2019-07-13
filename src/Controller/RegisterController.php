<?php

namespace App\Controller;

use App\Entity\Faculty;
use App\Form\FacultyType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register_faculty", name="security_register_faculty")
     */
    public function actionFormFaculty(Request $request, ObjectManager $manager)
    {
        $faculty = new Faculty();
        $form = $this->createForm(FacultyType::class, $faculty);
        $form->handleRequest( $request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($faculty);
            $manager->flush();
            return $this->redirectToRoute('security_register_faculty');
        }
        return $this->render('register/faculty.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
