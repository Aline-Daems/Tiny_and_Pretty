<?php

namespace App\Controller;

use App\Classe\search;
use App\Data\SearchData;
use App\Entity\Products;
use App\Form\SearchForm;
use App\Form\SearchType;
use App\Repository\ProductsRepository;
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


    #[Route('/produit/{slug}', name :'product')]

    public function show($slug): Response
    {

        $product = $this->entityManager->getRepository(Products::class)->findOneBySlug($slug);
        $products = $this->entityManager->getRepository(Products::class)->findByIsBest(1);
        $productN = $this->entityManager->getRepository(Products::class)->findByIsNew(1);


        if (!$product) {
            return $this->redirectToRoute('home');
        }
        return $this->render('product/show.html.twig', [
            'product' => $product,
            'products' => $products,
            'productN' => $productN,

        ]);

    }

}
