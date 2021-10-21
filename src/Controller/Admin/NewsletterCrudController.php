<?php

namespace App\Controller\Admin;

use App\Classe\Mail;
use App\Entity\Newsletter;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;

class NewsletterCrudController extends AbstractCrudController
{



    public static function getEntityFqcn(): string
    {
        return Newsletter::class;
    }


}
