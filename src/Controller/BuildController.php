<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuildController extends AbstractController
{
    /**
     * @Route("/builde/{slug}", name="build_show")
     */
    public function show(): Response
    {
        return $this->render('build/show.html.twig', [
            'controller_name' => 'BuildController',
        ]);
    }
}
