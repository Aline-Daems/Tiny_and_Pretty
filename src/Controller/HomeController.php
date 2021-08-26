<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Products;
use App\Form\SearchBaby;
use App\Form\SearchForm;
use App\Form\SearchToy;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]

    public function index()
    {
        $products = $this->entityManager->getRepository(Products::class)->findByIsBest(1);
        $productN = $this->entityManager->getRepository(Products::class)->findByIsNew(1);
        return $this->render('home/index.html.twig', [
            'products' => $products,
            'productN' => $productN


        ]);

            }
        #[Route('/Mode', name: 'productsBabies')]
        public function mode(ProductsRepository $repository, request $request): Response
    {
        $data = new searchData();
        $form3 = $this->createForm(SearchBaby::class, $data);
        $form3->handleRequest($request);
        $productsBaby = $repository->findSearchBaby($data);

        return $this->render('product/Mode/productsBabies.html.twig',[
            'productsBabies' => $productsBaby,
            'form3' => $form3->createView()
        ]);
    }

    #[Route('/maison', name: 'productsGirl')]
    public function home(ProductsRepository $repository, request $request): Response
    {
        $data = new searchData();
        $form2 = $this->createForm(SearchForm::class, $data);
        $form2->handleRequest($request);
        $productsGirl = $repository->findSearch($data);
        return $this->render('product/maison/productsGirl.html.twig', [
            'productsGirl' => $productsGirl,
            'form2'=> $form2->createView()
        ]);
    }

    #[Route('/toy', name: 'productsToy')]
    public function toys(ProductsRepository $repository, request $request): Response
    {
        $data = new searchData();
        $form4 = $this->createForm(SearchToy::class, $data);
        $form4->handleRequest($request);
        $productsToy = $repository->findSearchToy($data);
        return $this->render('product/toy/productsToys.html.twig', [
            'productsToy' => $productsToy,
            'form4'=> $form4->createView()
        ]);
    }

}
