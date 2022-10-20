<?php

namespace App\Controller;

use App\Entity\Killer;
use App\Repository\KillerRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class KillerController extends AbstractController
{
    /**
     * @Route("/killer/{slug}", name="killer_show")
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
}
