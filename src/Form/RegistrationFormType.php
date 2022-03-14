<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class,[
                'required' => false,
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'example@example.com'
                ]
            ])

            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent etre identique',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'autocomplete' => 'new-password'
                ],
                'first_options' => [
                    'label' => 'Mot de passe',
                    'attr' => [
                        'placeholder' => 'azerty'
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Le mot de passe est requis'
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Your password should be at least {{ limit }} caractères',
                            'max' => 4096
                        ])
                    ]
                ],
                'second_options' => [
                    'label' => 'Confirmer votre mot de passe',
                    'attr' => [
                        'placeholder' => 'confirmer mot de passe'
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Le mot de passe est requis'
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Your password should be at least {{ limit }} caractères',
                            'max' => 4096
                        ])
                    ]
                ],
            ])


            ->add('telephone',TextType::class, [
                'required' => false,
                'label' => 'Telephone',
                'attr' => [
                    'placeholder' => '0606060606'
                    ]
                    ])
      
        
                 
            ->add('FirstName',TextType::class,[
                'required' => false,
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Prénom'
                ]
            ])


            
            ->add('familyName',TextType::class,[
                'required' => false,
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom'
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
