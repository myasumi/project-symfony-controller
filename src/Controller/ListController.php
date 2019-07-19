<?php

namespace App\Controller;

use App\Entity\Course;
use App\Entity\Departament;
use App\Entity\Faculty;
use App\Entity\School;
use App\Entity\Teacher;
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
        //Esta funcion realiza el listado de todos los usuarios
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
        //Esta funcion realiza el listado de todos los facultades
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
        //Esta funcion realiza el listado de todos los escuelas profecionales
        $school_repo = $this->getDoctrine()->getRepository(School::class);
        $school = $school_repo->findAll();
        return $this->render('list/school.html.twig', [
            'schools' => $school,
        ]);
    }

    /**
     * @Route("/list_department", name="security_list_department")
     */
    public function actionListDepartment()
    {
        //Esta funcion realiza el listado de todos los departamento academico
        $department_repo = $this->getDoctrine()->getRepository(Departament::class);
        $department = $department_repo->findAll();
        return $this->render('list/department.html.twig', [
            'departments' => $department,
        ]);
    }

    /**
     * @Route("/list_teacher", name="security_list_teacher")
     */
    public function actionListTeacher()
    {
        //Esta funcion realiza el listado de todos los docentes
        $teacher_repo = $this->getDoctrine()->getRepository(Teacher::class);
        $teacher = $teacher_repo->findAll();
        return $this->render('list/teacher.html.twig', [
            'teachers' => $teacher,
        ]);
    }

    /**
     * @Route("/list_course", name="security_list_course")
     */
    public function actionListCourse()
    {
        //Esta funcion realiza el listado de todos los cursos
        $course_repo = $this->getDoctrine()->getRepository(Course::class);
        $course = $course_repo->findAll();
        return $this->render('list/course.html.twig', [
            'courses' => $course,
        ]);
    }

}
