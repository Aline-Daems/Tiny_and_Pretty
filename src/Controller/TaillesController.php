<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaillesController extends AbstractController
{
    #[Route('/tailles', name: 'tailles')]
    public function index(): Response
    {
        return $this->render('tailles/index.html.twig', [
            'controller_name' => 'TaillesController',
        ]);
    }
}
