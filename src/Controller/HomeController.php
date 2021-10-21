<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Newsletter;
use App\Entity\Products;
use App\Entity\User;
use App\Form\NewsletterType;
use App\Form\SearchBaby;
use App\Form\SearchBarType;
use App\Form\SearchHouse;
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
    public function index(request $request)
    {

        $products = $this->entityManager->getRepository(Products::class)->findByIsBest(1);
        $productN = $this->entityManager->getRepository(Products::class)->findByIsNew(1);
        $productC = $this->entityManager->getRepository(Products::class)->findByIsCollection(1);
        $notification = null;


        $Newsletter = new Newsletter();
        $formNews = $this->createForm(NewsletterType::class, $Newsletter);
        $formNews->handleRequest($request);
        if ($formNews->isSubmitted() && $formNews->isValid()) {
            $formNews->getData();
            $search_email = $this->entityManager->getRepository(Newsletter::class)->findOneByEmail($Newsletter->getEmail());
            if (!$search_email) {
                $this->entityManager->persist($Newsletter);
                $this->entityManager->flush();
            }
        }

        return $this->render('home/index.html.twig', [
            'products' => $products,
            'productN' => $productN,
            'productC' => $productC,
            'formNews' => $formNews->createView(),
            'notification' => $notification


        ]);

    }

    #[Route('/baby', name: 'productsBabies')]
    public function baby(ProductsRepository $repository, request $request): Response
    {
        $data = new searchData();
        $form3 = $this->createForm(SearchBaby::class, $data);
        $form3->handleRequest($request);
        $productsBaby = $repository->findSearchBaby($data);

        return $this->render('product/baby/productsBabies.html.twig', [
            'productsBabies' => $productsBaby,
            'form3' => $form3->createView()
        ]);
    }

    #[Route('/House', name: 'productsGirl')]
    public function home(ProductsRepository $repository, request $request): Response
    {
        $data = new searchData();
        $form2 = $this->createForm(SearchHouse::class, $data);
        $form2->handleRequest($request);
        $productsGirl = $repository->findSearch($data);
        return $this->render('product/House/productsHouse.html.twig', [
            'productsGirl' => $productsGirl,
            'form2' => $form2->createView()
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
            'form4' => $form4->createView()
        ]);
    }

    #[Route('/newsletter', name: 'newsletter')]
    public function newsletter(request $request): Response
    {


        $Newsletter = new Newsletter();
        $formNews = $this->createForm(NewsletterType::class, $Newsletter);
        $formNews->handleRequest($request);
        if ($formNews->isSubmitted() && $formNews->isValid()) {
            $formNews->getData();
            $search_email = $this->entityManager->getRepository(Newsletter::class)->findOneByEmail($Newsletter->getEmail());
            if (!$search_email) {
                $this->entityManager->persist($Newsletter);
                $this->entityManager->flush();
            }
        }

        return $this->render('home/index.html.twig', [

            'formNews' => $formNews->createView(),
        ]);
    }

    #[Route('/handlesearch', name: 'handlesearch')]
    public function handlesearch(request $request, ProductsRepository $repository): Response
    {

        $product = $this->entityManager->getRepository(Products::class)->findAll();

        $data = new SearchData();
        $formSearch = $this->createForm(SearchBarType::class, $data);
        $formSearch->handleRequest($request);
        $productsSearch = $repository->findSearchBar($data);
        return $this->render('header.html.twig', [
            'formSearch'=> $formSearch->createView(),
            'productSearch' => $productsSearch,
            'product' => $product

        ]);
    }

}
