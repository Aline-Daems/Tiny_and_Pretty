<?php

namespace App\Form;

use App\Entity\Products;
use App\Entity\Sizes;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SelectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sizes', EntityType::class, [
                'class' => Sizes::class,
                'multiple' => false,
                'expanded' => false,
                'query_builder'=> function(EntityRepository $er) {
                    return $er->createQueryBuilder('s')
                        ->select('s')
                        ->from(Products::class ,'p')
                        ->join('p.sizes', 'ps')
                        ->where('ps.id = s.id')
                        ;

                }

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
