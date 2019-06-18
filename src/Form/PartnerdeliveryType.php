<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class PartnerdeliveryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',TextType::class, array(
                'label' => false,
                'attr' => array('placeholder' => 'Email')
            ))
            ->add('firstname', TextType::class, array(
                'label' => false,
                'attr' => array('placeholder' => 'Prénom')
            ))
            ->add('lastname', TextType::class, array(
                'label' => false,
                'attr' => array('placeholder' => 'Nom')
            ))
            ->add('phone', TextType::class, array(
                'label' => false,
                'attr' => array('placeholder' => 'Téléphone')
            ))
            ->add('password', PasswordType::class, array(
                'label' => false,
                'attr' => array('placeholder' => 'Créer un mot de passe')
            ))
            ->add('city', TextType::class, array(
                'label' => false,
                'attr' => array('placeholder' => 'Ville')
            ));
    }
}
