<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SendEmailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('expediteur',HiddenType::class, array('required' => false, 'data' => 'lc.modeparis@gmail.com'))
            ->add('destinataire', TextType::class, array('label' => 'à : '))
            ->add('subject', TextType::class, array('label' => 'Sujet : '))
            ->add('message', TextareaType::class);
    }
}
