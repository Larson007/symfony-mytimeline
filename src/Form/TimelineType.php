<?php

namespace App\Form;

use App\Entity\Timelines;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TimelineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('year')
            ->add('month')
            ->add('day')
            ->add('headline')
            ->add('text')
            ->add('media')
            ->add('mediacredit')
            ->add('mediacaption')
            ->add('mediathumbnail')
            ->add('type')
            ->add('background')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Timelines::class,
        ]);
    }
}
