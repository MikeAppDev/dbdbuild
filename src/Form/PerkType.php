<?php

namespace App\Form;

use App\Entity\Perk;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class PerkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('image', FileType::class, [
                'mapped' => true, // siginfie que le champ est associé à une propriété et qu'il sera inséré en BDD
                'required' => false,
                'data_class' => null,
                
            ])
            ->add('slug')
            ->add('category', ChoiceType::class, [
                    'choices' => [
                        'Survivor' => 'Survivor',
                        'Killer' => 'Killer'
                    ]
                ]
            )
            ->add('Send', SubmitType::class, [
                'label' => 'Ajouter',
                'attr' => ['class' => 'btn-color-spe white']
             ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Perk::class,
        ]);
    }
}
