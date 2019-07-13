<?php

namespace App\Form;

use App\Entity\Roles;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'=>'Name: ',
            ])
            ->add('surname', TextType::class, [
                'label'=>'Surname: ',
            ])
            ->add('role', EntityType::class, [
                'label'=>'Type of user: ',
                'class' => Roles::class,
                'choice_label' => 'username',
            ])
            ->add('username', EmailType::class, [
                'label'=>'Email: ',
            ])
            ->add('password', PasswordType::class, [
                'label'=>'Password: ',
            ])
            ->add('conf_password', PasswordType::class, [
                'label'=>'Confirm password: ',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
