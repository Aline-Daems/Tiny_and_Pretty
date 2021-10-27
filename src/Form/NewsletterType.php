<?php

namespace App\Form;

use App\Entity\Newsletter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsletterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [

                'label'=>false,
                'attr' => [
                    'placeholder' => 'Email',
                 'class' => 'col-5 ']
            ])

            ->add('submit', SubmitType::class, [

                'label' => "C'EST PAR ICI",
                 'attr' => [
                       'class' => 'btn profite reveal-3 mt-4 mb-3',
                        'data-bs-toggle' =>'popover',
                         'data-bs-content'=>'Merci pour votre inscription ;)'
                 ]])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Newsletter::class,
        ]);
    }
}
