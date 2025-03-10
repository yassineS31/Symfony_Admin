<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Category;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;


class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id','ID')->hideOnForm(),
            TextField::new('title','Titre'),
            TextField::new('content','Contenu'),
            DateTimeField::new('createAt','Date de parution')->setFormat('dd-mm-YYYY'),
            AssociationField::new('author','Auteur')->onlyOnForms(),
            AssociationField::new('categories','Categorie')->onlyOnForms(),
        ];
    
    }
}
