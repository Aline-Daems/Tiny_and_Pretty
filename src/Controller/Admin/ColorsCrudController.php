<?php

namespace App\Controller\Admin;

use App\Entity\Colors;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ColorsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Colors::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
