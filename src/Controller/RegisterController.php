<?php

namespace App\Controller;

use App\Entity\Departament;
use App\Entity\Faculty;
use App\Entity\School;
use App\Entity\Teacher;
use App\Entity\Users;
use App\Form\DepartmentType;
use App\Form\FacultyType;
use App\Form\SchoolType;
use App\Form\TeacherType;
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

    /**
     * @Route("/register_school", name="security_register_school")
     */
    public function actionFormRegisterSchool(Request $request, ObjectManager $manager)
    {
        $school = new School();
        $form = $this->createForm(SchoolType::class, $school);
        $form->handleRequest( $request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($school);
            $manager->flush();
            return $this->redirectToRoute('security_register_school');
        }
        return $this->render('register/school.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/register_department", name="security_register_department")
     */
    public function actionFormRegisterDepartment(Request $request, ObjectManager $manager)
    {
        $department = new Departament();
        $form = $this->createForm(DepartmentType::class, $department);
        $form->handleRequest( $request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($department);
            $manager->flush();
            return $this->redirectToRoute('security_register_department');
        }
        return $this->render('register/department.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/register_teacher", name="security_register_teacher")
     */
    public function registerTeacher(Request $request, ObjectManager $manager)
    {
        $teacher = new Teacher();
        $form = $this->createForm(TeacherType::class, $teacher);
        $form->handleRequest( $request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($teacher);
            $manager->flush();
            return $this->redirectToRoute('security_register_teacher');
        }
        return $this->render('register/teacher.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
