<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchBarType;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
public function SearchBar(){

    $formSearch = $this->createFormBuilder()
        ->setAction($this->generateUrl('handlesearch'))
        ->add('query', TextType::class, [
            'label' => false,
            'attr'=> [
                'class'=> 'form-control',
//                'placeholder'=>'Recherche',
            ]
        ])
    /*    ->add('Recherche', SubmitType::class, [
            'attr'=> [
                'class' => 'btn btn-primary'
            ]
        ])*/
        ->getForm();
    return$this->render('search/searchbar.html.twig', [
        'formSearch' => $formSearch->createView()
    ]);

}

    #[Route('/handlesearch', name: 'handlesearch')]
    public function handlesearch(request $request, ProductsRepository $repository): Response
    {
        $query = $request->request->get('formSearch')['query'];
        if($query){
            $product = $repository->findSearchBar($query);
        }
        return $this->render('search/index.html.twig', [
            'product' => $product
        ]);
    }
}
