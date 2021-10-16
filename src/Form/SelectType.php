<?php

namespace App\Form;

use App\Entity\Products;
use App\Entity\Sizes;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityRepository;
use Proxies\__CG__\App\Entity\Size;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SelectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('s', EntityType::class, [
                'class' => Sizes::class,
                'multiple' => false,
                'expanded' => false,
                'query_builder'=> function(ProductsRepository $er) {
                    return $er->createQueryBuilder('s')
                        ->select('s.name')
                        ->from('product.sizes', 's')
                        ->join('sizes', 's')
                        ->
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
