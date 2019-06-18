<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PartnershopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('shop_name',TextType::class, array(
                'label' => false,
                'attr' => array('placeholder' => 'Nom de la boutique')
            ))
            ->add('address', TextType::class, array(
                'label' => false,
                'attr' => array('placeholder' => 'Adresse de la boutique')
            ))
            ->add('firstname', TextType::class, array(
                'label' => false,
                'attr' => array('placeholder' => 'Prénom')
            ))
            ->add('lastname', TextType::class, array(
                'label' => false,
                'attr' => array('placeholder' => 'Nom')
            ))
            ->add('status', TextType::class, array(
                'label' => false,
                'attr' => array('placeholder' => 'Statut (propriétaire, gérant, etc...)')
            ))
            ->add('phone', TextType::class, array(
                'label' => false,
                'attr' => array('placeholder' => 'Téléphone')
            ))
            ->add('shop_number', TextType::class, array(
                'label' => false,
                'attr' => array('placeholder' => 'Nombre de boutiques')
            ));
    }
}
