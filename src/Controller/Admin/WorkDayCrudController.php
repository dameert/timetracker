<?php

namespace App\Controller\Admin;

use App\Entity\WorkDay;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class WorkDayCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return WorkDay::class;
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
