<?php

namespace App\Controller;

use App\Entity\Perk;
use App\Form\PerkType;
use App\Repository\PerkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PerksController extends AbstractController
{

    /**
     * @Route("/perk/{id}", name="perk_show")
     */
    public function index(?Perk $perk, PerkRepository $perkRepository): Response
    {
        if(!$perk){
            return $this->redirectToRoute('app_home');
        }
        return $this->render('perks/show.html.twig', [
            'perk' => $perk,
            'perks' => $perkRepository ->findAll()
        ]);
    }

    /**
     * @Route("/allperk", name="allperk")
     * @Route("/perk/{id}/remove", name="removeperk")
     */
    public function show(EntityManagerInterface $manager, PerkRepository $perkRepository, Request $request, Perk $perkRemove = null): Response
    {
        $perks = $perkRepository->findAll();

        if($perkRemove)
        {   
            //je stock l'Id de la perk
            $id = $perkRemove->getId();

            //j'execute la methode remove de l'interface EntityManagerInterface.(formulation de la requete de suppr)
            $manager->remove($perkRemove);
            // flush() execute la requete DELETE en BDD
            $manager->flush();
            // Affiche le message
            $this->addFlash('success', "La Perk a bien été supprimé !");
            //redirection vers la page
            return $this->redirectToRoute('allperk');
        }

        return $this->render('perks/allperk.html.twig', [
            'perks' => $perks,
        ]);
    }

    /**
     * @Route("/addperk", name="addperk")
     * @Route("/perk/{id}/edit", name="perk_edit")
     */
    public function add(Perk $perk = null, Request $request, SluggerInterface $slugger, EntityManagerInterface $manager): Response
    {
        if($perk)
        {
            $perkActuel = $perk->getImage();
        }

        if(!$perk)
        {
            $perk = new Perk;
        }
        
        $perkForm = $this->createForm(PerkType::class, $perk);
        $perkForm->handleRequest($request);

        if($perkForm->isSubmitted() && $perkForm->isValid())
        {
            $imageFile = $perkForm->get('image')->getData();

            if ($imageFile) {
                $originalFileName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFileName);
                $newFilename =  $safeFilename.'-'.uniqid().".".$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('upload_directory_perk'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->addFlash('message','une erreur est survenu lors de l\'upload de l\'image!');
                    // return $this->redirectToRoute('allbuild');
                }

                $perk->setImage($newFilename);

                $perkData = $perkForm->getData();

            }
            else
            {
                $perk->setImage($perkActuel);
            }

            $manager->persist($perk);
            $manager->flush();
            $this->addFlash('success',"Perks bien enregistré");
                

            unset($perkForm);
            $perk = new Perk();
            $perkForm = $this->createForm(PerkType::class, $perk);

            return $this->redirectToRoute('allperk');
        }


        return $this->render('perks/addperk.html.twig', [
            'form' => $perkForm->createView(),
            'editMode' => $perk->getId(),
            'imagePerk' => $perk->getImage()
        ]);
    }
}
