<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UpdateProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            // ->add('roles')
            // ->add('password')
            ->add('name')
            ->add('firstName')
            ->add('adresse')
            ->add('CP', TextType::class, [
                'label'     => 'Code Postal',
                'required' => false,
                'constraints' =>[
                    new Regex(array(
                        'pattern'   => '/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/',
                        'match'     => true,
                        'message'   => 'Veuillez entrer une code postal correct !'
                    )),
                ]
            ])
            ->add('city', TextType::class, [
                'label'     => 'Ville',
                'required' => false,
                'constraints' =>[
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre ville doit contenir au moins deux caractères alphabétiques',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    new Regex(array(
                        'pattern'   => '/^[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-]+$/',
                        'match'     => true,
                        'message'   => 'Veuillez entrer une ville correct !'
                    )),
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
