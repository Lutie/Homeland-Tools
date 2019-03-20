<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class StuffType extends AbstractType
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
            ->add('price', IntegerType::class, [
                'label' => 'Modificateur de Prix',
            ])
            ->add('addedPriceByWeight', IntegerType::class, [
                'label' => 'Prix par gabarit',
            ])
            ->add('addedPriceByHeight', IntegerType::class, [
                'label' => 'Prix par taille',
            ])
            ->add('addedPriceByShape', IntegerType::class, [
                'label' => 'Prix si allégé/renforcé',
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
