<?php

namespace App\Controller;
use App\Entity\ChoiceSize;
use App\Entity\Products;
use App\Entity\Size;
use App\Entity\Wish;
use App\Repository\WishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
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
        $size = $this->entityManager->getRepository(Size::class)->findAll();
        $choiceSize = $this->entityManager->getRepository(ChoiceSize::class)->findAll();


        if (!$product) {
            return $this->redirectToRoute('home');
        }
        return $this->render('product/show.html.twig', [
            'product' => $product,
            'products' => $products,
            'productN' => $productN,
            'Size' => $size,
            'ChoiceSize' => $choiceSize
        ]);

    }

    #[Route('/favoris/ajout/{id}', name :'ajout_favoris')]

    public function ajoutFavoris(Products $products): Response
    {


      $products->addFavori($this->getUser());

      $em = $this->getDoctrine()->getManager();
      $em->persist($products);
      $em->flush();

        return $this->json([
            'code' => 200,
            'message' => 'wish bien ajouté',
        ], 200);

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
            'status' => $products->getFavoris()
        ], 200);

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
