<?php

namespace App\Controller;

use DateTime;
use App\Entity\Build;
use App\Entity\Killer;
use App\Entity\Comment;
use App\Form\BuildType;
use App\Form\Type\CommentType;
use App\Repository\BuildRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class BuildController extends AbstractController
{
    /**
     * @Route("/builde/{slug}", name="build_show")
     */
    public function show(?Build $build, Request $request, EntityManagerInterface $manager): Response
    {
        //dd($build);
        if(!$build){
            return $this->redirectToRoute('app_home');
        }
        
        // $artcile provient de l'entity Comment.
        $comment = new Comment();
        $commentForm = $this->createForm(CommentType::class, $comment);
        $commentForm->handleRequest($request);

        if($commentForm->isSubmitted() && $commentForm->isValid())
        {
            // dd($this->getUser);
            $comment->setCreatedAt(new \DateTime());
            $comment->setBuild($build);
            $comment->setUser($this->getUser());
            
            $manager->persist($comment);
            $manager->flush();

            $this->addFlash('success',"Le com est enregistré");
            
            unset($commentForm);
            $comment = new Comment();
            $commentForm = $this->createForm(CommentType::class, $comment);
        }
        
        $comments = $build->getComments();
        
        return $this->renderForm('build/show.html.twig', [
            'build' => $build,
            'commentForm' => $commentForm,
            'comments' => $comments
        ]);
        
    }


    /**
     * @Route("/allbuild", name="allbuild")
     */
    public function showAll(BuildRepository $buildRepository, Request $request) :Response
    {
        $builds = $buildRepository->findAll();


        return $this->render('build/allbuild.html.twig', [
            'builds' => $builds
        ]);
    }

    /**
     * @Route("/addbuild", name="addbuild")
     */
    public function AddBuild(Request $request, SluggerInterface $slugger, EntityManagerInterface $manager) :Response
    {
        $build = new Build;
        $buildForm = $this->createForm(BuildType::class, $build);
        $buildForm->handleRequest($request);

        if($buildForm->isSubmitted() && $buildForm->isValid())
        {
            $imageFile = $buildForm->get('image')->getData();

            if ($imageFile) {
                $originalFileName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFileName);
                $newFilename =  $safeFilename.'-'.uniqid().".".$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('upload_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->addFlash('message','une erreur est survenu lors de l\'upload de l\'image!');
                    // return $this->redirectToRoute('allbuild');
                }
                $buildData = $buildForm->getData();

                $buildData->setCreatedAt(new DateTime('NOW'));

                $build->setImage($newFilename);

                $manager->persist($build);
                $manager->flush();
                $this->addFlash('success',"Build bien enregistré");
                
            }

            unset($buildForm);
            $build = new Build();
            $buildForm = $this->createForm(BuildType::class, $build);

            return $this->redirectToRoute('allbuild');
        }

        return $this->render('build/addBuild.html.twig', [
            'form' => $buildForm->createView()
        ]);
    }
}
