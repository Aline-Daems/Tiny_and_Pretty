<?php

namespace App\Controller;

use App\Data\SelectData;
use App\Form\SelectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SelectController extends AbstractController
{
    #[Route('/select', name: 'select')]
    public function index(Request $request): Response
    {
        $sizeData = new SelectData();
        $selectForm = $this->createForm(SelectType::class, $sizeData);
        $selectForm->handleRequest($request);

        return $this->render('product/show.html.twig', [
            'SelectForm' => $selectForm->createView()
        ]);
    }
}
