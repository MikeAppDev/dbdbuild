<?php

namespace App\Controller;

use App\Entity\Build;
use App\Entity\Killer;
use App\Entity\Comment;
use App\Form\Type\CommentType;
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
        // dd($build);
        if(!$build){
            return $this->redirectToRoute('app_home');
        }
        
        // $artcile provient de l'entity Comment.
        $comment = New Comment($build);

        $commentForm = $this->createForm(CommentType::class, $comment);

        return $this->renderForm('build/show.html.twig', [
            'build' => $build,
            'commentForm' => $commentForm
        ]);
    }
}
