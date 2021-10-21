<?php

namespace App\Controller\Admin;

use App\Entity\Kids;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BoyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Kids::class;
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
