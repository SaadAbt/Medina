<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\RegistrationType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityContorllerController extends AbstractController
{
    /**
     * @Route("/inscription", name="registration")
     */

    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $utilisateur = new Utilisateur();
        $form= $this->createForm(RegistrationType::class, $utilisateur);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
             $hash = $encoder->encodePassword($utilisateur , $utilisateur->getPassword());
             $utilisateur->setPassword($hash);
             $utilisateur->setProfile(1);
             $manager->persist($utilisateur);
             $manager->flush();
             return $this->redirectToRoute('login');
        }

        return $this->render('Security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(){
        return $this->render('Security/login.html.twig');
    }

    /**
     * @Route("/logout", name="logout")
     */

    public function logout(){

    }
}
