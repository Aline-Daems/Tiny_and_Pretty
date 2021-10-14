<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\Products;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchBarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
         ->add('searchBar', TextType::class, [

             'label' => false,
             'attr' => [
                 'class' => 'form-control form-control-sm mr-3 w-75',
                 'type' =>'text',
                 'aria-label'=>'Search',
                 'placeholder'=> 'Commencez votre recherche'
             ]
         ])
            ->add('recherche', SubmitType::class, [
                'attr'=>[
                    'class'=> 'btn btn-primary'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}
