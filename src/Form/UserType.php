<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',TextType::class, array('label' => 'Prénom'))
            ->add('lastname', TextType::class, array('label' => 'Nom'))
            ->add('password', TextType::class, array('label' => 'Mot de passe'))
            ->add('email', TextType::class, array('label' => 'Email'));
    }
}
