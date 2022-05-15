<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Product;
use Doctrine\ORM\Mapping\AssociationOverride;
use Doctrine\ORM\Persisters\MatchingAssociationFieldRequiresObject;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('price')
            ->add('description')
            ->add('datedeb')
            ->add('datefin')
            ->add('promo')

            ->add('categorie',EntityType::class,[
                'class'=>Categorie::class,
                'choice_label'=>'label',
                'multiple'=>false
            ])
            ->add('save',SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
