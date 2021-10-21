<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchType;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KidsController extends AbstractController
{
    #[Route('/kids', name: 'productsKids')]
    public function index(ProductsRepository $repository, request $request): Response
    {
        $data = new searchData();
        $form = $this->createForm(SearchType::class, $data);
        $form->handleRequest($request);
        $productsKids = $repository->findSearchKids($data);

        return $this->render('product/Kids/productsKids.html.twig', [
            'productsKids' => $productsKids,
            'form' => $form->createView(),
        ]);
    }
}
