<?php

namespace App\Controller;


use App\Entity\Products;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    #[Route('/favoris/ajout/{id}', name :'ajout_favoris')]

    public function ajoutFavoris(Products $products): Response
    {


      $products->addFavori($this->getUser());

      $em = $this->getDoctrine()->getManager();
      $em->persist($products);
      $em->flush();

        return $this->redirectToRoute('home');

    }

    #[Route('/favoris/retrait/{id}', name :'retrait_favoris')]

    public function retraitFavoris(Products $products): Response
    {

        $products->removeFavori($this->getUser());

        $em = $this->getDoctrine()->getManager();
        $em->persist($products);
        $em->flush();

        return $this->redirectToRoute('home');

    }


}
