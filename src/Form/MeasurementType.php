<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Measurement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
//            ->add('date')
//            ->add('humidity')
//            ->add('wind_speed')
//            ->add('celsius')
//            ->add('pressure')
//            ->add('wind_direct')
//            ->add('location', EntityType::class, [
//                'class' => Location::class,
//                'choice_label' => 'id',
//            ])
//        ;
            ->add('date', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('humidity', NumberType::class)
            ->add('wind_speed', NumberType::class)
            ->add('celsius', NumberType::class)
            ->add('pressure', NumberType::class)
            ->add('wind_direct')
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'city',
                'placeholder' => 'Select a location',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
