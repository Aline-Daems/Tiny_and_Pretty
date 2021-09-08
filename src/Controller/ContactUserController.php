<?php

namespace App\Controller;

use App\Entity\ContactUser;
use App\Form\ContactUserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactUserController extends AbstractController
{
    #[Route('/contact/user', name: 'contact_user')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contactuser = new ContactUser();

        $form = $this->createForm(ContactUserType::class, $contactuser);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($contactuser);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }


        return $this->render('contact_user/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
