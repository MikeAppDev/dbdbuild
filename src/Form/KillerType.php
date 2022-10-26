<?php

namespace App\Form;

use App\Entity\Killer;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\SlugType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class KillerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('slug')
            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => true,
                'mapped' => true
            ])
            // ->add('killers', EntityType::class, [
            //     'class' => Killer::class,
            //     'choice_label' => 'name',
            //     'mapped' => false
            // ])
            // ->add('builds')
            ->add('Send', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Killer::class,
        ]);
    }
}
