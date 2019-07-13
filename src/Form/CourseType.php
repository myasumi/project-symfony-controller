<?php

namespace App\Form;

use App\Entity\Course;
use App\Entity\School;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo', TextType::class, [
                'label' => 'Code: ',
                'attr' => ['placeholder' => 'Enter the course code...'],
            ])
            ->add('name', TextType::class, [
                'label' => 'Name: ',
                'attr' => ['placeholder' => 'Enter the name of the course...'],
            ])
            ->add('credits', TextType::class, [
                'label' => 'Credits: ',
                'attr' => ['placeholder' => 'Enter the number of credits of the course...'],
            ])
            ->add('school', EntityType::class, [
                'label' => 'School: ',
                'class' => School::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Course::class,
        ]);
    }
}
