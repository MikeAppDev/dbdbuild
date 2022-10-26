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
     * @Route("/perk/{slug}", name="perk_show")
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
     */
    public function show(PerkRepository $perkRepository, Request $request): Response
    {
        $perks = $perkRepository->findAll();

        return $this->render('perks/allperk.html.twig', [
            'perks' => $perks,
        ]);
    }

        /**
     * @Route("/addperk", name="addperk")
     */
    public function add(Request $request, SluggerInterface $slugger, EntityManagerInterface $manager): Response
    {
        $perk = new Perk;
        $perkForm = $this->createForm(PerkType::class, $perk);
        $perkForm->handleRequest($request);

        if($perkForm->isSubmitted() && $perkForm->isValid())
        {

            $manager->persist($perk);
            $manager->flush();

            $this->addFlash('success',"La Perk est enregistré");

            unset($perkForm);
            $perk = new Perk();
            $perkForm = $this->createForm(PerkType::class, $perk);

            return $this->redirectToRoute('allperk');
        }

        return $this->render('perks/addperk.html.twig', [
            'form' => $perkForm->createView()
        ]);
    }
}
