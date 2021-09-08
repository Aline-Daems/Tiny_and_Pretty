<?php

namespace App\Controller;

use App\Entity\ContactPartner;
use App\Form\ContactPartnerType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactPartnerController extends AbstractController
{
    #[Route('/contact/partner', name: 'contact_partner')]
    public function index(Request $request,  EntityManagerInterface $entityManager): Response
    {
        $contactpartner = new ContactPartner();

        $form = $this->createForm(ContactPartnerType::class, $contactpartner);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($contactpartner);
            $entityManager->flush();
            return $this->redirectToRoute('home');

        }


        return $this->render('contact_partner/index.html.twig', [
            'form' => $form->createView()
        ]);

    }
}
