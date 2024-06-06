<?php

namespace App\Controller\Admin;

use App\Entity\Submenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SubmenuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Submenu::class;
    }

    public function configureFields(string $pageName): iterable
    {
        // return [
        //     TextField::new('name'),
        //     AssociationField::new('parent')
        //         ->setCrudController(SubmenuCrudController::class)
        //         ->setRequired(false),
        //     AssociationField::new('menu')
        //         ->setCrudController(MenuCrudController::class)
        //         ->setRequired(false),
        // ];
        return [
            TextField::new('name'),
            AssociationField::new('parent')
                ->setCrudController(self::class)
                ->setRequired(false),
            AssociationField::new('children')
                ->setCrudController(self::class)
                ->setRequired(false),
            AssociationField::new('menu')
                ->setCrudController(MenuCrudController::class)
                ->setRequired(true),
        ];
    }
}
