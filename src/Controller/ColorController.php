<?php

namespace App\Controller;

use App\Entity\ChoiceColor;

use App\Entity\Color;
use App\Entity\Products;

use App\Repository\ChoiceColorRepository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ColorController extends AbstractController
{

    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @param ManagerRegistry $manager
     * @param $id
     * @return Response
     */
    #[Route('product/{product}/choiceColor/{id}', name :'choice-color')]
    #[ParamConverter('product', Products::class, options: ['id'=>'product'])]
    public function choice(Products $product, ManagerRegistry $manager, $id,ChoiceColorRepository $choiceColorRepository): Response
    {

        $color = $this->entityManager->getRepository(Color::class)->findOneById($id);
        $user = $this->getUser();

        if (!$user) {
            return $this->json([
                'code' => 403,
                'message' => 'non autorisé'
            ], 403);
        }
        if ($product->isChoiceColorByUser($user)) {
            $colors = $choiceColorRepository->findOneBy([
                'product' => $product,
                'User' => $user,

            ]);


            $em = $manager->getManager();
            $em->remove($colors);
            $em->flush();


            $colors = new ChoiceColor();

            $colors
                ->setProduct($product)
                ->setUser($user)
                ->setColor($color);


            $em = $manager->getManager();
            $em->persist($colors);
            $em->flush();


            return $this->json([
                'code' => 200,
                'message'=> 'choice mis a jour'
            ],200);

        }


        $colors = new ChoiceColor();

        $colors
            ->setProduct($product)
            ->setUser($user)
            ->setColor($color);


        $em = $manager->getManager();
        $em->persist($colors);
        $em->flush();


        return $this->json([
            'code' => 200,
            'message'=> 'choice ok'
        ],200);
    }

}
