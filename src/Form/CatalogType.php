<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class CatalogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ref',TextType::class, array('label' => 'Référence'))
            ->add('title', TextType::class, array('label' => 'Nom du produit'))
            ->add('image', TextType::class, array('label' => 'Image'))
            ->add('description', TextType::class, array('label' => 'Description'))
            ->add('price', TextType::class, array('label' => 'Prix'))
            ->add('stock', TextType::class, array('label' => 'Stock'))
            ->add('category', TextType::class, array('label' => 'Catégorie'))
            ->add('composition', TextType::class, array('label' => 'Composition'));
    }
}