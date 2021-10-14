<?php

namespace App\Controller\Admin;

use App\Entity\baby;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BabyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return baby::class;
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
