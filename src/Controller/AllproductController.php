<?php

namespace App\Controller;

use App\Entity\ChoiceColor;
use App\Entity\ChoiceSize;
use App\Entity\Color;
use App\Entity\Products;
use App\Entity\Size;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AllproductController extends AbstractController
{
    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/allproduct', name: 'allproduct')]


    public function index(): Response
    {

        $products = $this->entityManager->getRepository(Products::class)->findAll();
        $productN = $this->entityManager->getRepository(Products::class)->findByIsNew(1);
        $productC = $this->entityManager->getRepository(Products::class)->findByIsCollection(1);

        return $this->render('product/allproduct.html.twig', [

            'products' => $products,
            'productN' => $productN,
            'productC' => $productC,

        ]);
    }
}
