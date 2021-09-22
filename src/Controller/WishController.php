<?php

namespace App\Controller;

use App\Entity\Products;
use App\Entity\Wish;
use App\Repository\WishRepository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
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



//Route qui gère la vue de la wishlist

    #[Route('/wish', name: 'wish')]
    public function index(WishRepository $wishRepository, ): Response
    {

        $user = $this->getUser();

        $wishAll = $this->entityManager->getRepository(Wish::class)->findAll();
        $product = $this->entityManager->getRepository(Products::class)->findAll();
        $products = $this->entityManager->getRepository(Products::class)->findByIsBest(1);
        $productN = $this->entityManager->getRepository(Products::class)->findByIsNew(1);

        $wish = $wishRepository->findBy([
            'product' => $product,
            'user' => $user
        ]);

        if (!$product) {
            return $this->redirectToRoute('home');
        }
        return $this->render('wish/index.html.twig', [
            'product' => $product,
            'products' => $products,
            'productN' => $productN,
            'wish' => $wish,
            'wishAll' => $wishAll,
        ]);

    }




    /**
     *
     * Permet d'ajout ou de retirer un article de la wishlist
     *
     * @param Products $product
     * @param ManagerRegistry $manager
     * @param WishRepository $wishRepository
     * @return Response
     */
    #[Route('/product/{id}/wish', name :'products-wish')]
    public function wish(Products $product, ManagerRegistry $manager, WishRepository $wishRepository): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->json([
                'code' => 403,
                'message' => 'non autorisé'
            ], 403);
        }

        if ($product->isWishByUser($user)) {
            $wish = $wishRepository->findOneBy([
                'product' => $product,
                'user' => $user
            ]);
            $em = $manager->getManager();
            $em->remove($wish);
            $em->flush();

            return $this->json([
                'code' => 200,
                'message' => 'favoris bien supprimer'
            ], 200);
        }

        $wish = new Wish();
        $wish->setProduct($product)
            ->setUser($user);
        $em = $manager->getManager();
        $em->persist($wish);
        $em->flush();

        return $this->json([
            'code' => 200,
            'message' => 'ca marche bien'
        ],200);
    }

}
