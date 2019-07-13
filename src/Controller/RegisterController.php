<?php

namespace App\Controller;

use App\Entity\Faculty;
use App\Entity\Users;
use App\Form\FacultyType;
use App\Form\UserType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register_faculty", name="security_register_faculty")
     */
    public function actionFormRegisterFaculty(Request $request, ObjectManager $manager)
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

    /**
     * @Route("/register_user", name="security_register_user")
     */
    public function actionFormRegisterUser(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new Users();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest( $request);
        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();
            //return $this->redirectToRoute('security_login');
        }
        return $this->render('register/user.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
