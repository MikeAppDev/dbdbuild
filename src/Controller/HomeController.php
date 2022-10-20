<?php

namespace App\Controller;

use App\Repository\BuildRepository;
use App\Repository\KillerRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(BuildRepository $buildRepository, CategoryRepository $categoryRepository, KillerRepository $killerRepository): Response
    {
        return $this->render('home/index.html.twig', [
            // 'controller_name' => 'HomeController',
            'builds' => $buildRepository->findAll(),
            'categories' => $categoryRepository ->findAll(),
            'killers' => $killerRepository ->findAll()
        ]);
    }
}
