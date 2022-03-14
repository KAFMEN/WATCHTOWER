<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name',TextType::class,[
            'label' => 'Nom du produit',
            'attr' => [
                'placeholder' => 'Taper le nom ici...'
            ],
            'required' => false
        ])
        ->add('file',FileType::class,[
            'mapped' => false,
            'label' => 'Upload une image',
            'required' => false,
            'constraints' => [
                new NotBlank([
                    'message' => 'Vous devez ajouter une image'
                ]),
                new File([
                    'maxSize' => '1m',
                    'maxSizeMessage' => 'Le poids ne peut dépasser 1mo. Votre fichier est trop lourd.'
                ])
            ]
        ])
            ->add('price',MoneyType::class,[
                'label' => 'Prix du produit',
                'required' => false,
                'divisor' => 100
            ])
            ->add('category',EntityType::class,[
                'class' => Category::class,
                'choice_label' => 'name',
                'required' => false,
                'placeholder' => '--Choisir une catégorie--'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
