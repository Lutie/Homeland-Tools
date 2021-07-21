<?php

namespace App\Form;

use App\Entity\StuffFamily;
use App\Entity\StuffParticularity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class NewStuffType extends AbstractType
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
            ->add('type', EntityType::class, [
                'label' => 'Type',
                'class' => \App\Entity\StuffType::class,
                'multiple' => false
            ])
            ->add('category', ChoiceType::class, [
                'choices' => [
                    '0 (Civile)' => 0,
                    '1 (Improvisé/Tissus/Etoffes)' => 1,
                    '2 (Commune/Peaux/Cuirs)' => 2,
                    '3 (Guerre/Mailles/Ecailles)' => 3,
                    '4 (Guerre(lourd)/Plaque/Plate)' => 4,
                    '5 (Cavalerie)' => 5,
                    '6 (Siège léger)' => 6,
                    '7 (Siège intermédiaire)' => 7,
                    '8 (Siège lourd)' => 8,
                ],
                'label' => 'Type'
            ])
            ->add('height', ChoiceType::class, [
                'choices' => [
                    '0 (Moyenne)' => 0,
                    '1 (Grand)' => 1,
                    '2 (Très grand)' => 2,
                    '-1 (Petit)' => -1,
                    '-2 (Très petit)' => -2,
                ],
                'label' => 'Taille'
            ])
            ->add('weight', ChoiceType::class, [
                'choices' => [
                    '0 (Intermédiaire)' => 0,
                    '1 (Lourd)' => 1,
                    '2 (Très lourd)' => 2,
                    '-1 (Léger)' => -1,
                    '-2 (Très léger)' => -2,
                ],
                'label' => 'Gabarit'
            ])
            ->add('family', EntityType::class, [
                'label' => 'Famille',
                'class' => StuffFamily::class,
                'multiple' => false
            ])
            ->add('particularities', EntityType::class, [
                'label' => 'Particularités',
                'class' => StuffParticularity::class,
                'multiple' => true,
                'required' => false
            ])
            ->add('weaponGrip', ChoiceType::class, [
                'choices' => [
                    'Manche' => 'FOR',
                    'Garde' => 'DEX',
                    'Hampe' => 'AGI',
                    'Prise (distance)' => 'PER',
                    'Poignet (défense)' => 'CON',
                ],
                'label' => 'Type de Prise (Arme)'
            ])
            ->add('weaponKind', ChoiceType::class, [
                'choices' => [
                    'Contondant' => 'FOR',
                    'Tranchant' => 'DEX',
                    'Perforant' => 'AGI',
                    'Transperçant' => 'PER',
                    'Flexible' => 'CON',
                ],
                'label' => 'Type d\'Impact (Arme)'
            ])
            ->add('shape', ChoiceType::class, [
                'choices' => [
                    'Normal' => 0,
                    'Allégé' => -1,
                    'Renforcé' => 1,
                ],
                'label' => 'Forme'
            ])
            ->add('armorIsAdvanced', ChoiceType::class, [
                'choices' => [
                    'Classique' => '0',
                    'Avancée' => '1'
                ],
                'label' => 'Classique ou avancée ?'
            ])
            ->add('img', FileType::class, [
                'label' => 'Image (facultatif)',
                'required' => false
            ])
        ;
    }

}
