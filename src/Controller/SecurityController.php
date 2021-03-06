<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="security_login")
     */
    public function actionLogin(AuthenticationUtils $authentication)
    {
        $error = $authentication->getLastAuthenticationError();
        $username = $authentication->getLastUsername();
        return $this->render('security/login.html.twig', [
            'username' => $username,
            'error'  => $error,
        ]);
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function actionLogout()
    {
        return $this->redirectToRoute('security_home');
    }
}
