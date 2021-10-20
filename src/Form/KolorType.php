<?php

namespace App\Form;

use App\Entity\Colors;
use App\Entity\Products;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KolorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('colors', EntityType::class, [
                'mapped'=> false,
                'class' => Colors::class,
                'multiple' => false,
                'expanded' => true,
                'query_builder'=> function(EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->select('c')
                        ->from(Products::class ,'p')
                        ->join('p.colors', 'pc')
                        ->where('pc.id = c.id')
                        ;

                }

            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
