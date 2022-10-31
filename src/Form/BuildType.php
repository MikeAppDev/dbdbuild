<?php

namespace App\Form;

use App\Entity\Perk;
use App\Entity\Build;
use App\Entity\Killer;
use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class BuildType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'required' => false,
                'label' => "Nom du Build",
                'attr' => [ 
                    'placeholder' => "Nom de votre Build"
                    ]
                ])
            ->add('slug')
            ->add('content', TextareaType::class, [
                'required' => false,
                'label' => "Contenu",
                'attr' => [ 
                    'placeholder' => "Informations sur votre build",
                    'rows' => 6,
                ]
            ])
            // ->add('featuredText')
            // ->add('createdAt')
            // ->add('updatedAt')
            ->add('image', FileType::class, array('data_class' => null))
            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => true,
                'mapped' => true,
                'expanded' => true,
            ])
            ->add('perk1', EntityType::class, [
                'class' => Perk::class,
                'choice_label' => 'name',
                'multiple' => true,
                'label' => "Choisissez 4 perks",
                'attr' => [ 
                    'placeholder' => "Vos perks",
                ],
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name', 'ASC');
                },

            ])
            
            // ->add('featuredImage')
            ->add('killers', EntityType::class, [
                'class' => Killer::class,
                'choice_label' => 'name',
                'multiple' => true,
                'mapped' => true,
                'expanded' => true,
                'label' => "Choisi ton tueur",
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name', 'ASC');
                },
            ])
            ->add('Send', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Build::class,
        ]);
    }
}
