<?php

namespace App\Form;

use App\Entity\Colors;
use App\Entity\Products;
use App\Entity\Sizes;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SizeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sizes', EntityType::class, [
                'required' => true,
                'label' => 'Taille',
                'mapped'=> false,
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

            ->add('colors', EntityType::class, [
                'required' => true,
                'label' => 'Couleurs',
                'mapped'=> false,
                'class' => Colors::class,
                'multiple' => false,
                'expanded' => false,
                'query_builder'=> function(EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->select('c')
                        ->from(Products::class ,'p')
                        ->join('p.colors', 'pc')
                        ->where('pc.id = c.id')
                        ;

                }

            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Ajouter au panier',
                'attr' => [
                    'class' => 'btn btn-outline-secondary outline-show col mt-3 ml-1 mr-1 text-uppercase'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
