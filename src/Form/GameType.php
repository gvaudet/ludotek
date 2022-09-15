<?php

namespace App\Form;

use App\Entity\Game;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'label' => 'nom du jeu',
                'attr' => [
                    'placeholder' => 'Piq Pirate!',
                    'class' => 'createInput'
                ],
                'row_attr' => [
                    'class' => 'formDiv',
                ]
            ])
            ->add('picture', FileType::class, [
                'label' => 'Photo du jeu', 
                'row_attr' => [
                    'class' => 'formDiv',
                ]
            ])
            ->add('description', null, [
                'row_attr' => [
                    'class' => 'formDiv',
                ], 
                'attr' => [
                    'rows' => 5,
                ]
            ])
            ->add('minimumAge', RangeType::class, [
                'attr' => [
                    'min' => 2, 
                    'max' => 18
                ], 
                'label' => 'Age minimum', 
                'row_attr' => [
                    'class' => 'formDiv',
                ]
            ])
            ->add('minimumPlayer', null, [
                'attr' => [
                    'class' => 'createInput',
                ],
                'label' => 'Nombre de joueur minimum',
                'row_attr' => [
                    'class' => 'formDiv',
                ]
            ])
            ->add('maximumPlayer', null, [
                'attr' => [
                    'class' => 'createInput',
                ],
                'label' => 'Nombre de joueur maximum',
                'row_attr' => [
                    'class' => 'formDiv',
                ]
            ])
            ->add('duration', null, [
                'label' => 'Durée de la partie',
                'row_attr' => [
                    'class' => 'formDiv',
                ]
            ])
            ->add('releaseAt', null, [
                'widget' => 'single_text',
                'label' => 'Sortie du jeu', 
                'row_attr' => [
                    'class' => 'formDiv',
                ]
            ])
            ->add('category', null, [
                'label' => 'Catégorie de jeu',
                'row_attr' => [
                    'class' => 'formDiv',
                ]
            ])
            ->add('editors', null, [
                'choice_label' => 'name',
                'label' => 'Editeurs', 
                'row_attr' => [
                    'class' => 'formDiv'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
