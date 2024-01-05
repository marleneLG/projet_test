<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $user = $this->getUser();
        // 1. REDIRECT USER IF USER IS CONNECTED
        if ($this->getUser()) {
            dump($user);
            return $this->redirectToRoute('home');
        }
        //2. get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        //3. last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login/index.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
}
