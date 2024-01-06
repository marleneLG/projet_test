<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\SecurityBundle\Security;

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

    #[Route('/logout', name: '_logout_main')]
    public function logout(Security $security): Response
    {
        dump('coucou');
        // logout the user in on the current firewall
        $response = $security->logout();

        // you can also disable the csrf logout
        $response = $security->logout(false);
        return $response;
        // ... return $response (if set) or e.g. redirect to the homepage
    }

}
