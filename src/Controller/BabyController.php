<?php

namespace App\Controller;

use App\Entity\baby;
use App\Entity\Products;
use App\Data\SearchData;

use App\Form\SearchBaby;
use App\Form\SearchType;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BabyController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }
    #[Route('/baby', name: 'productsBabies')]
    public function index(ProductsRepository $repository, request $request): Response
    {
        $data = new searchData();
        $form3 = $this->createForm(SearchBaby::class, $data);
        $form3->handleRequest($request);
        $productsBaby = $repository->findSearchBaby($data);

    return $this->render('product/baby/productsBabies.html.twig',[
        'productsBabies' => $productsBaby,
        'form3' => $form3->createView()
        ]);
    }


}
