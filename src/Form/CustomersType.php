<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class CustomersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',TextType::class, array('label' => 'Prénom'))
            ->add('lastname', TextType::class, array('label' => 'Nom'))
            ->add('address_1', TextType::class, array('label' => 'Adresse 1'))
            ->add('address_2', TextType::class, array('label' => 'Adresse 2'))
            ->add('zip_code', TextType::class, array('label' => 'Code postal'))
            ->add('city', TextType::class, array('label' => 'Ville'))
            ->add('phone_number', TextType::class, array('label' => 'N° de téléphone'))
            ->add('email', TextType::class, array('label' => 'Email'));
    }
}