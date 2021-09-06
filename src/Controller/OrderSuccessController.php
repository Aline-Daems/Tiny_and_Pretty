<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Classe\Mail;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderSuccessController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entitymanager)
    {
        $this->entityManager = $entitymanager;
    }


    #[Route('/commandes/merci/{stripeSessionId}', name :'order_validate')]

    public function index(Cart $cart, $stripeSessionId): Response
    {
        $order = $this->entityManager->getRepository(Order::class)->findOneByStripeSessionId($stripeSessionId);

        if(!$order || $order->getUser() != $this->getUser()){
            return $this->redirectToRoute('home');
        }
        if ($order->getState() == 0){


             //vider la session "cart"
            $cart->remove();


            //Modifier le statut isPaid de notre commande en mettant 1 ( est payé )
            $order->setState(1);

            $this->entityManager->flush();

            // Envoyer un email à notre client pour lui confirmer sa commande`




            $mail = new Mail();
            $title = ' Bonjour '.$order->getUser()->getFirstname()."<br/>";
            $name =  $order->getUser()->getFirstname();
            $ref = $order->getReference();
            $email = $order->getUser()->getEmail();
            $address = $order->getUser()->getAddresses();

            $content = 'Merci pour vos achats ! <br/> Nous avons bien reçu votre commande. <br/> Nous vous contacterons une fois que votre colis sera expédié. <br/> Nous trouverez le récapitulatif de votre commande ci-dessous.';

            $mail->sendOrder($order->getUser()->getEmail(), $order->getUser()->getFirstname(),'Votre commande est bien validée', $content, $title, $name, $ref, $email, $address);

    }
        return $this->render('order_validate/index.html.twig', [
            'order'=>$order
        ]);
    }
}
