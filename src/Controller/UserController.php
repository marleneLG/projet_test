<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{

    // private $datetime;

    // function __construct()
    // {
    //     $this->datetime = (new \DateTime('now'))->format('Y/m/d H:i:s');
    // }
    public function new(Request $request): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
        }

        return $this->render('register/registration.html.twig', [
            'form' => $form,
        ]);
    }
}
