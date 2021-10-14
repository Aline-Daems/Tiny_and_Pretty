<?php

namespace App\Form;

use App\Entity\ChoiceSize;
use App\Entity\Size;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChoiceSizeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $options['user'];
        $builder
            ->add('product', TextType::class)
            ->add('user')
            ->add('size', EntityType::class,[
                'label'=>'taille',
                'class'=>Size::class,
                'choice'=>$user->getAddresses()
            ])
            ->add('userChoices')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ChoiceSize::class,
            'method' => 'GET'
        ]);
    }
}
