<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Category;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
<<<<<<< HEAD
=======
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
>>>>>>> 17354ff9a917947db5ea297c25544468a8e27f0e
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;


class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

<<<<<<< HEAD
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id','ID')->hideOnForm(),
            TextField::new('title','Titre'),
            TextField::new('content','Contenu'),
            DateTimeField::new('createAt','Date de parution')->setFormat('dd-mm-YYYY'),
            AssociationField::new('author','Auteur')->onlyOnForms(),
            AssociationField::new('categories','Categorie')->onlyOnForms(),
=======
  
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'Id')->hideOnForm(),
            TextField::new('title', 'Titre'),
            TextareaField::new('content', 'Contenu')->setMaxLength(30)->setNumOfRows(30),
            DateTimeField::new('createAt', 'Date de création')->setFormat('dd-mm-YYYY'),        
            AssociationField::new('author', 'Auteur')->autocomplete()->hideOnIndex(),
            AssociationField::new('categories', 'Catégories')->autocomplete()->hideOnIndex(),
>>>>>>> 17354ff9a917947db5ea297c25544468a8e27f0e
        ];
    
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 17354ff9a917947db5ea297c25544468a8e27f0e
