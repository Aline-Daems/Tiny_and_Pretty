<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChildType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add('child', ChoiceType::class,[
                'label' => "Avez-vous des enfants ?",
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
            ])


            ->add('childNumber', ChoiceType::class,[
                'label' => "Combien avez-vous d'enfants ?",
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                ]
            ])

            ->add('birthday', BirthdayType::class, [
                'label'=> "Date d'anniversaire de votre enfant",
                'years' => range(date('Y')-25, date('Y')),
            ])


            ->add('submit', SubmitType::class, [
                'label' => 'Submit'
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
