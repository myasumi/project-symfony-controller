<?php

namespace App\Form;

use App\Entity\Departament;
use App\Entity\Faculty;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepartmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name: ',
                'attr' => ['placeholder' => 'Enter the name of the course...'],
            ])
            ->add('acronym', TextType::class, [
                'label' => 'Acronym: ',
                'attr' => ['placeholder' => 'Enter the acronym of the department...'],
            ])
            ->add('vision', TextareaType::class, [
                'label' => 'Vision: ',
                'attr' => ['placeholder' => 'Enter the vision of the department...'],
            ])
            ->add('mission', TextareaType::class, [
                'label' => 'Mission: ',
                'attr' => ['placeholder' => 'Enter the mission of the department...'],
            ])
            ->add('faculty', EntityType::class, [
                'label'=>'Faculty: ',
                'class' => Faculty::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Departament::class,
        ]);
    }
}
