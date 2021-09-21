<?php

namespace App\Controller;

use App\Entity\Products;
use App\Entity\Wish;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WishController extends AbstractController
{
    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }




    #[Route('/wish', name: 'wish')]
    public function index(): Response
    {
        $wish = $this->entityManager->getRepository(Wish::class)->findAll();
        $product = $this->entityManager->getRepository(Products::class)->findAll();
        $products = $this->entityManager->getRepository(Products::class)->findByIsBest(1);
        $productN = $this->entityManager->getRepository(Products::class)->findByIsNew(1);


        if (!$product) {
            return $this->redirectToRoute('home');
        }
        return $this->render('wish/index.html.twig', [
            'product' => $product,
            'products' => $products,
            'productN' => $productN,
            'wish' => $wish
        ]);

    }

    #[Route('/favoris/retrait/{id}', name :'retrait_favoris')]

    public function retraitFavoris(Products $products): Response
    {

        $products->removeFavori($this->getUser());

        $em = $this->getDoctrine()->getManager();
        $em->persist($products);
        $em->flush();

        return $this->json([
            'code' => 200,
            'message' => 'wish bien supprimé',

        ], 200);

    }
}
