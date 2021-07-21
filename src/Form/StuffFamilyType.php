<?php

namespace App\Form;

use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class StuffFamilyType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $option)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('description', TextType::class, [
                'label' => 'Description (faculatif)',
                'required' => false,
            ])
            ->add('effectOnScore', IntegerType::class, [
                'label' => 'Score (tous)',
            ])
            ->add('effectOnAttackScore', IntegerType::class, [
                'label' => 'Score en Attaque',
            ])
            ->add('effectOnDefenseScore', IntegerType::class, [
                'label' => 'Score en Défense',
            ])
            ->add('effectOnTacticalScore', IntegerType::class, [
                'label' => 'Score en Tactique',
            ])
            ->add('effectOnHardness', IntegerType::class, [
                'label' => 'Bonus de Solidité',
            ])
            ->add('effectOnReach', IntegerType::class, [
                'label' => 'Bonus d\'Allonge',
            ])
            ->add('effectOnSpeed', IntegerType::class, [
                'label' => 'Bonus de Vitesse',
            ])
            ->add('effectOnQuickness', IntegerType::class, [
                'label' => 'Bonus de Rapidité',
            ])
            ->add('effectOnPrice', IntegerType::class, [
                'label' => 'Modificateur de Prix',
            ])
            ->add('effectOnWeight', IntegerType::class, [
                'label' => 'Modificateur de Poids',
            ])
            ->add('effectOnPenality', IntegerType::class, [
                'label' => 'Modificateur de Pénalités',
            ])
            ->add('effectOnCounterAttackScore', IntegerType::class, [
                'label' => 'Score en Contre Attaque',
            ])
            ->add('effectOnAdversaryDefenseScore', IntegerType::class, [
                'label' => 'Score adverse en Défense',
            ])
            ->add('isDangerous', IntegerType::class, [
                'label' => 'Dangerosité',
            ])
            ->add('isMechanical', ChoiceType::class, [
                'choices' => [
                    'Non' => false,
                    'Oui' => true
                ],
                'label' => 'Mécanique ?',
            ])
            ->add('magazineCapacity', IntegerType::class, [
                'label' => 'Magasin (si munition)',
            ])
            ->add('addedMagazineByCategory', IntegerType::class, [
                'label' => 'Magasin par catégorie',
            ])
        ;
    }

}
