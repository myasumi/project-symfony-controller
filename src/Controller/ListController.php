<?php

namespace App\Controller;

use App\Entity\Faculty;
use App\Entity\School;
use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    /**
     * @Route("/list_user", name="security_list_user")
     */
    public function actionListUser()
    {
        $user_repo = $this->getDoctrine()->getRepository(Users::class);
        $user = $user_repo->findAll();
        return $this->render('list/user.html.twig', [
            'users' => $user,
        ]);
    }

    /**
     * @Route("/list_faculty", name="security_list_faculty")
     */
    public function actionListFaculty()
    {
        $faculty_repo = $this->getDoctrine()->getRepository(Faculty::class);
        $faculty = $faculty_repo->findAll();
        return $this->render('list/faculty.html.twig', [
            'faculties' => $faculty,
        ]);
    }

    /**
     * @Route("/list_school", name="security_list_school")
     */
    public function toListSchool()
    {
        $school_repo = $this->getDoctrine()->getRepository(School::class);
        $school = $school_repo->findAll();
        return $this->render('list/school.html.twig', [
            'schools' => $school,
        ]);
    }
}
