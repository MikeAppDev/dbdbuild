<?php

namespace App\Controller;

use App\Entity\Comment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentController extends AbstractController
{
    /**
     * @Route("/comment", name="comment_add")
     * @Route("/comment/{id}", name="comment_update")
     */
    public function register(?Comment $comment, Request $request, EntityManagerInterface $manager): Response
    {
        $com = new Comment();
        $formcom = $this->createForm(CommentType::class, $com);
        $formcom->handleRequest($request);
        // dd($request);

        if($formcom->isSubmitted() && $formcom->isValid())
        {
            $com->setDate(new \DateTime());
            $com->setBuild($build);
            
            $manager->persist($com);
            $manager->flush();

            $this->addFlash('success',"Le com est enregistré");
        }

        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }
}
