<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UpdateProfileFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            $user = $this->getUser()
        ]);
    }

    /**
     *  @Route("/profile", name="app_profile")
     */
    public function modifUser(): Response
    {
        return $this->render('user/user.html.twig', [
            $user = $this->getUser()
        ]);
    }

    /**
     * @Route("/profile/{id}/edit", name="app_profile_edit")
     */
    public function profile(User $user = null, Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        
        if(!$user)
        {
            $user = new User();
        }

        $form = $this->createForm(UpdateProfileFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            if(!$user->getId())
                $mot = 'Enregistré';
            else
                $mot = 'Modifier';

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('succes', "Changement : $mot avec succès");
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_profile',[
                'id' => $user->getId()
            ]);
        }

        return $this->render('user/form.html.twig', [
            $user = $this->getUser(),
            'form' => $form->createView(),
            'editMode' => $user->getId()
        ]);
    }
}
