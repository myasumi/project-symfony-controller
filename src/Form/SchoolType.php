<?php

namespace App\Form;

use App\Entity\Faculty;
use App\Entity\School;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchoolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name: ',
                'attr' => ['placeholder' => 'Enter the name of the school...'],
            ])
            ->add('curriculum', TextType::class, [
                'label' => 'Curriculum: ',
                'attr' => ['placeholder' => 'Enter the professional school curriculum...'],
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
            'data_class' => School::class,
        ]);
    }
}
