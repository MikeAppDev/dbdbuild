<?php

namespace App\Form\Type;

use App\Entity\Build;
use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
         ->add('content', TextareaType::class, [
            'label' => 'Avis'
         ])
         ->add('build', HiddenType::class)
         ->add('send', SubmitType::class, [
            'label' => 'Send'
         ])
         ;
        $builder->get('build')
            ->addModelTransformer(new CallbackTransformer(
                fn (Build $build) => $build->getId(),
                fn (Build $build) => $build->getTitle()
            ));
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class
        ]);
    }
}
