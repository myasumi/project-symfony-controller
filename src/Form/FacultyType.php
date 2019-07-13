<?php

namespace App\Form;

use App\Entity\Faculty;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FacultyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name: ',
                'attr' => ['placeholder' => 'Enter the name of the faculty...'],
            ])
            ->add('acronym', TextType::class, [
                'label' => 'Acronym: ',
                'attr' => ['placeholder' => 'Enter the acronym of the faculty...'],
            ])
            ->add('vision', TextareaType::class, [
                'label' => 'Vision: ',
                'attr' => ['placeholder' => 'Enter the vision of the faculty...'],
            ])
            ->add('mission', TextareaType::class, [
                'label' => 'Mission: ',
                'attr' => ['placeholder' => 'Enter the mission of the faculty...'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Faculty::class,
        ]);
    }
}
