<?php

namespace App\Controller\Admin;

use App\Entity\WorkDay;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class WorkDayCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return WorkDay::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('date'),
            CollectionField::new('timeSlots'),
        ];
    }
}
