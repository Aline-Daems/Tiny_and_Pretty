<?php

namespace App\Controller\Admin;


use App\Entity\Picture;
use App\Entity\Products;
use App\Form\PictureType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name'),
            ImageField::new('image')
                ->setFormType(VichImageType::class)
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads/')
                ->setRequired(false)
                ->onlyOnDetail(),
            CollectionField::new('pictures')
                ->setEntryType(PictureType::class),
            ImageField::new('illustration')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads/')
                ->setRequired(false),
            TextField::new('Subtitle'),
            TextareaField::new('description'),
            BooleanField::new('isBest'),
            BooleanField::new('isNew'),
            BooleanField::new('soldOut'),
            MoneyField::new('price')->setCurrency('EUR'),
            AssociationField::new('mode'),
            AssociationField::new('maison'),
            AssociationField::new('toys')
            ];
    }

}
