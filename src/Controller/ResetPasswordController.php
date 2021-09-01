<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\ResetPassword;
use App\Entity\User;
use App\Form\ResetPasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class ResetPasswordController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/mot-de-passe-oublie", name="reset_password")
     */

    public function index(Request $request): Response
    {
        if ($this->getUser()){
            return $this->redirectToRoute('home');
        }

        if ($request->get('email')) {
            $user = $this->entityManager->getRepository(User::class)->findOneByEmail($request->get('email'));

            if ($user) {
                // 1 : enregistrer en base la demande de reset_password avec user, token, createdAd.
                $reset_password = new ResetPassword();
                $reset_password->setUser($user);
                $reset_password->setToken(uniqid('', true));
                $reset_password->setCreatedAt(new \DateTimeImmutable());
                $this->entityManager->persist($reset_password);
                $this->entityManager->flush();

                // 2 : Envoyer un email à l'utilisateur avec un lien lui permettant de mettre à jour son mot de passe.

                $url = $this->generateUrl('update_password"', [
                    'token' => $reset_password->getToken()
                ]);

                $content = "Bonjour ".$user->getFirstname()."<br/>Vous avez demandé à réinitialiser votre mot de passe sur le site Tiny And Pretty.<br/><br/>";
                $content .= "Merci de bien vouloir cliquer sur le lien suivant pour <a href='".$url."'>mettre à jour votre mot de passe.</a>";

                $mail = new Mail();
                $mail->send($user->getEmail(), $user->getFirstname().''.$user->getLastname(),'Réinitialiser votre mot de passe sur Tiny And Pretty', $content);
                $this->addFlash('notice','Vous allez recevoir dans quelques instant un mail avec la procédure de réinitialisation de votre mot de passe.');
;            } else {
                $this->addFlash('notice','Cette adresse email est inconnue.');
            }
        }

        return $this->render('reset_password/index.html.twig');
    }


    #[Route('/modifier-mon-mot-de-passe/{token}', name: 'update_password')]

    public function update(Request $request, $token, UserPasswordEncoderInterface $encoder): Response
    {
        $reset_password = $this->entityManager->getRepository(ResetPassword::class)->findOneByToken($token);

        if (!$reset_password) {
            return $this->RedirectToRoute('reset_password');
        }

        // Vérifier si le createdAt = now - 1H
        $now = new \DateTimeImmutable();
        if ($now > $reset_password->getCreatedAt()->modify('+ 1 hour')) {

            $this->addFlash('notice','Votre demande de mot de passe à expiré, Merci de la renouveller.');
            return $this->redirectToRoute('reset_password');
        }

        // Rendre une vue avec mot de passe et confirmer mot de passe.
        $form = $this->createForm(ResetPasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $new_pwd = $form->get('new_password')->getData();

            // Encodage des mots de passe.
            $password = $encoder->encodePassword($reset_password->getUser(), $new_pwd);
            $reset_password->getUser()->setPassword($password);

            // Flush en base de donnée.
            $this->entityManager->flush();

            // Redirection de l'utilisateur vers la page de connexion.
            $this->addFlash('notice', 'Votre mot de passe a bien été mis à jour');
            $this->redirectToRoute('app_login');
        }

        return $this->render('reset_password/update.html.twig',[
            'form' => $form->createView()
            ]);
    }
}
