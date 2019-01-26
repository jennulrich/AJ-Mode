<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SendEmailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('expediteur',TextType::class)
            ->add('destinataire', TextType::class)
            ->add('subject', TextType::class, array('label' => 'Sujet'))
            ->add('message', TextareaType::class, array('label' => 'Message'));
    }
}
