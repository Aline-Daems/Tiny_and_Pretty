<?php

namespace App\Controller;

use App\Classe\search;
use App\Entity\Products;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/nos-produits', name :'products')]

    public function index(Request $request): Response
    {
        $search = new search();
        $form = $this->createForm(SearchType::class, $search);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $products = $this->entityManager->getRepository(Products::class)->findWithSearch($search);
        }else {
            $products = $this->entityManager->getRepository(Products::class)->findAll();
        }
        return $this->render('product/index.html.twig', [
            'products'=>$products,
            'form' => $form->createView()
        ]);
    }



    #[Route('/produit/{slug}', name :'product')]

    public function show($slug): Response
    {

        $product = $this->entityManager->getRepository(Products::class)->findOneBySlug($slug);
        $products = $this->entityManager->getRepository(Products::class)->findByIsBest(1);

        if (!$product) {
            return $this->redirectToRoute('products');
        }
        return $this->render('product/show.html.twig', [
            'product' => $product,
            'products' => $products
        ]);
    }
}