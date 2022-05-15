<?php

namespace App\Form;

use App\Entity\EventsReservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventsReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tel')
            ->add('Reservations',ChoiceType::class,["choices"=>["1"=>1,"2"=>2,"3"=>3,"4"=>4   ]])
            ->add('LesEvenements')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EventsReservation::class,
        ]);
    }
}
