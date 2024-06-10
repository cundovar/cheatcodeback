<?php

namespace App\Controller\Admin;

use App\Entity\MenuContent;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class MenuContentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MenuContent::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
//         Explications
// setUploadDir('public/images/admin') :
// Définit où les images téléchargées seront stockées sur le serveur.
// setBasePath('images/admin') :
// Définit le chemin de base pour accéder aux images dans le navigateur.
// setUploadedFileNamePattern('[randomhash].[extension]') :
// Définit un schéma de nommage sécurisé pour les fichiers téléchargés.
// setRequired(false) :
// Indique que le champ d'image n'est pas obligatoire.
        return [
            ImageField::new('image')
            ->setUploadDir('public/images/admin')
            ->setBasePath('images/admin')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
            AssociationField::new('submenu')->setRequired(true),
            TextField::new('title'),
            TextEditorField::new('para'),
            TextareaField::new('content'),
            TextEditorField::new('para1'),
            TextareaField::new('content1'),
          
         
            
        ];
    }
 

    
}
