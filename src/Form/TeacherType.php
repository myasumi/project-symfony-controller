<?php

namespace App\Form;

use App\Entity\Departament;
use App\Entity\Teacher;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('condicion', TextType::class, [
                'label' => 'Condition: ',
                'attr' => ['placeholder' => 'Enter the teacher condition...'],
            ])
            ->add('categoria', TextType::class, [
                'label' => 'Category: ',
                'attr' => ['placeholder' => 'Enter the teacher category...'],
            ])
            ->add('codigo', TextType::class, [
                'label' => 'Code: ',
                'attr' => ['placeholder' => 'Enter the teacher code...'],
            ])
            ->add('departament', EntityType::class, [
                'label' => 'Department: ',
                'class' => Departament::class,
                'choice_label' => function ($depart) {
                    return $depart->getName();
                }
                /*'choice_label' => 'name',*/
            ])
            ->add('users', EntityType::class, [
                'label' => 'User: ',
                'class' => Users::class,
                'choice_label' => function ($user) {
                    return $user->getName().' '.$user->getSurname();
                }
                /*'choice_label' => 'name',*/
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
        ]);
    }
}
