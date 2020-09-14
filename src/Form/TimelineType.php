<?php

namespace App\Form;

use App\Entity\Timelines;
use App\Entity\Categories;
use App\Form\CategoriesType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TimelineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('start_date')
            ->add('end_date')
            ->add('description')
            //->add('publication_date')
            ->add('thumbnail')  // UPLOAD d'un thumbnail : https://symfony.com/doc/current/controller/upload_file.html
            ->add('categories', EntityType::class, [
                'class'         =>  Categories::class,
                'choice_label'  =>  'themes',
                'label'         =>  'Thème Principal',
                'expanded'     =>  true,
                'multiple'      =>  false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Timelines::class,
        ]);
    }
}
