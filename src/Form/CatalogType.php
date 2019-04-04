<?php

namespace App\Form;

use App\Entity\Shop;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Security\Core\Security;

class CatalogType extends AbstractType
{

    /*private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }*/

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('shop', EntityType::class, array(
                'class' => Shop::class,
                'choice_label' => 'shop_name',
                'label' => 'test'
            ))
            ->add('ref',TextType::class, array('label' => 'Référence'))
            ->add('title', TextType::class, array('label' => 'Nom du produit'))
            ->add('image', TextType::class, array('label' => 'Image'))
            ->add('description', TextType::class, array('label' => 'Description'))
            ->add('price', TextType::class, array('label' => 'Prix'))
            ->add('stock', TextType::class, array('label' => 'Stock'))
            ->add('category', TextType::class, array('label' => 'Catégorie'))
            ->add('composition', TextType::class, array('label' => 'Composition'));


        //$user = $this->security->getUser();
    }
}
