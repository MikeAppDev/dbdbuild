<?php

namespace App\Form;

use App\Entity\Killer;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\SlugType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class KillerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false,
                'label' => "Nom du Tueur",
                'attr' => [ 
                    'placeholder' => "Nom de votre Killer"
                    ]
                ])
            ->add('slug')
            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => true,
                'mapped' => true,
                'label' => "Choisissez votre Categorie",
            ])

            // ->add('killers', EntityType::class, [
            //     'class' => Killer::class,
            //     'choice_label' => 'name',
            //     'mapped' => false
            // ])
            // ->add('builds')
            ->add('Send', SubmitType::class, [
                'label' => 'Ajouter',
                'attr' => ['class' => 'btn-color-spe white']
             ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Killer::class,
        ]);
    }
}
