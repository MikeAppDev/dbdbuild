<?php

namespace App\Controller;

use App\Entity\Build;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BuildController extends AbstractController
{
    /**
     * @Route("/builde/{slug}", name="build_show")
     */
    public function show(?Build $build): Response
    {
        if(!$build){
            return $this->redirectToRoute('app_home');
        }
        return $this->render('build/show.html.twig', [
            'build' => $build
        ]);
    }
}
