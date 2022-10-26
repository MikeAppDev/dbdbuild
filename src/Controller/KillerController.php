<?php

namespace App\Controller;

use App\Entity\Killer;
use App\Form\BuildType;
use App\Form\KillerType;
use App\Repository\KillerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class KillerController extends AbstractController
{
    /**
     * @Route("/killer/{id}", name="killer_show")
     */
    public function index(?Killer $killer, KillerRepository $killerRepository): Response
    {
        if(!$killer){
            return $this->redirectToRoute('app_home');
        }
        return $this->render('killer/show.html.twig', [
            'killer' => $killer,
            'killers' => $killerRepository ->findAll()
        ]);
    }

    /**
     * @Route("/allkiller", name="allkiller")
     * @Route("/killer/{id}/remove", name="removekiller")
     */
    public function showAll(EntityManagerInterface $manager, KillerRepository $killerRepository, Killer $killerRemove = null, Request $request) :Response
    {
        $killers = $killerRepository->findAll();

        if($killerRemove)
        {
            //je stock l'Id de la perk
            $id = $killerRemove->getId();
            //j'execute la methode remove de l'interface EntityManagerInterface.(formulation de la requete de suppr)
            $manager->remove($killerRemove);
            // flush() execute la requete DELETE en BDD
            $manager->flush();
            // Affiche le message
            $this->addFlash('success', "La Killer a bien été supprimé !");
            //redirection vers la page
            return $this->redirectToRoute('allkiller');
        }

        return $this->render('killer/allkiller.html.twig', [
            'killers' => $killers
        ]);
    }

    /**
     * @Route("/addkiller", name="addkiller")
     * @Route("/killer/{id}/edit", name="killer_edit")
     */
    public function AddBuild(Killer $killer = null, Request $request, SluggerInterface $slugger, EntityManagerInterface $manager) :Response
    {   
        if(!$killer)
        {
            $killer = new Killer;
        }

        $killerForm = $this->createForm(KillerType::class, $killer);
        $killerForm->handleRequest($request);

        if($killerForm->isSubmitted() && $killerForm->isValid())
        {

            $manager->persist($killer);
            $manager->flush();

            $this->addFlash('success',"Le Killer est bien enregistré");

            unset($killerForm);
            $killer = new Killer();
            $killerForm = $this->createForm(KillerType::class, $killer);

            return $this->redirectToRoute('allkiller');
        }

        return $this->render('killer/addKiller.html.twig', [
            'form' => $killerForm->createView(),
            'editMode' => $killer->getId(),
        ]);
    }
}
