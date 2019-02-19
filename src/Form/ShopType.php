<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ShopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('shop_name',TextType::class, array('label' => 'Nom de la boutique'))
            ->add('address', TextType::class, array('label' => 'Adresse'))
            ->add('owner', DateTimeType::class, array('label' => 'Propriétaire / Gérant'))
            ->add('email', TextType::class, array('label' => 'Email'))
            ->add('phone', TextType::class, array('label' => 'Téléphone'));
    }
}
