<?php
// src/BlogBundle/BlogBundle/Form/EnquiryType.php

namespace BlogBundle\BlogBundle\Form;

use BlogBundle\BlogBundle\Entity\Enquiry;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class EnquiryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        
        $builder->add('name');
        $builder->add('email', EmailType::class);
        $builder->add('subject');
        $builder->add('body', TextareaType::class);
    }

    public function getName()
    {
        return 'contact';
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Enquiry::class,
        ));
    }
}