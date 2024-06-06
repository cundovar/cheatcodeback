<?php

namespace App\Controller\Admin;

use App\Entity\MenuContent;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MenuContentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MenuContent::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('content'),
            TextareaField::new('content1'),
            TextareaField::new('para'),
            TextareaField::new('para1'),
            AssociationField::new('submenu')->setRequired(true)
        ];
    }
    
}
