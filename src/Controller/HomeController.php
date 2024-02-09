<?php

namespace App\Controller;

use App\Repository\TrickRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{

    #[Route('/', name: 'home')]
    public function home(TrickRepository $repo): Response
    {
        $tricks = $repo->findBy([], ['created_at' => 'DESC'], 15, 0);

        return $this->render(
        'home/home.html.twig', [
            'tricks' => $tricks
        ]);
    }
}
