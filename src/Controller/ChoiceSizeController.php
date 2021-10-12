<?php

namespace App\Controller;

use App\Entity\ChoiceSize;
use App\Entity\Products;
use App\Entity\Size;
use App\Repository\ChoiceSizeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class ChoiceSizeController extends AbstractController
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
        $choiceAllSize = $this->entityManager->getRepository(ChoiceSize::class)->findAll();


        if (!$product) {
            return $this->redirectToRoute('home');
        }
        return $this->render('product/show.html.twig', [
            'product' => $product,
            'products' => $products,
            'productN' => $productN,
            'Size' => $size,
            'choiceAllSize'=> $choiceAllSize
        ]);

    }

    /**
     * @param ManagerRegistry $manager
     * @param $id
     * @return Response
     */
    #[Route('product/{product}/choiceSize/{id}', name :'choice-size')]
    #[ParamConverter('product', Products::class, options: ['id'=>'product'])]
    public function choice(Products $product, ManagerRegistry $manager, $id,ChoiceSizeRepository $choiceSizeRepository): Response
    {

        $size = $this->entityManager->getRepository(Size::class)->findOneById($id);
        $user = $this->getUser();

        if (!$user) {
            return $this->json([
                'code' => 403,
                'message' => 'non autorisé'
            ], 403);
        }
        if ($product->isChoiceSizeByUser($user)) {
            $sizes = $choiceSizeRepository->findOneBy([
                'product' => $product,
                'user' => $user,

            ]);
            $em = $manager->getManager();
            $em->remove($sizes);
            $em->flush();


            $sizes = new ChoiceSize();

            $sizes
                ->setProduct($product)
                ->setUser($user)
                ->setSize($size);


            $em = $manager->getManager();
            $em->persist($sizes);
            $em->flush();


            return $this->json([
                'code' => 200,
                'message'=> 'choice mis a jour'
            ],200);

        }


        $sizes = new ChoiceSize();

        $sizes
            ->setProduct($product)
            ->setUser($user)

            ->setSize($size);


        $em = $manager->getManager();
        $em->persist($sizes);
        $em->flush();


        return $this->json([
            'code' => 200,
            'message'=> 'choice ok'
        ],200);
    }


}
