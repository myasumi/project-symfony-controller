<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name: ',
                'attr' => ['placeholder' => 'Enter contact name...'],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email: ',
                'attr' => ['placeholder' => 'Enter contact email...'],
            ])
            ->add('message', TextType::class, [
                'label' => 'Message: ',
                'attr' => ['placeholder' => 'Enter the message to send...'],
            ])
            ->add('subject', TextType::class, [
                'label' => 'Subject: ',
                'attr' => ['placeholder' => 'Enter the subject to send...'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
