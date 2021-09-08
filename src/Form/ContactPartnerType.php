<?php

namespace App\Form;

use App\Entity\ContactPartner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactPartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('who',ChoiceType::class, [
                'choices' => [
                    'Atelier' => 'atelier',
                    'Partenaire' => 'partner',

                ],
                'multiple'=>false,
                'expanded'=>true,

           ] )
            ->add('Iam', ChoiceType::class,[
                'choices' => [
                    'Personne physique' => 'PP',
                    'Société' => 'SO',
                ],
                'multiple'=>false,
                'expanded'=>true,

            ])
            ->add('tva', NumberType::class)
            ->add('email', EmailType::class)
            ->add('siteweb')
            ->add('tel', NumberType::class)
            ->add('adress')
            ->add('work', ChoiceType::class,[
                'choices' => [
                    'Activité complémentaire ' => 'Act Comp',
                    'Temps-plein' => 'TP',
                ],
                'multiple'=>false,
                'expanded'=>true,

            ])
            ->add('description', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactPartner::class,
        ]);
    }
}
