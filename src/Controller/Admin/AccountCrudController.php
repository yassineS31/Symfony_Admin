<?php

namespace App\Controller\Admin;

use App\Entity\Account;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class AccountCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Account::class;
    }

<<<<<<< HEAD
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id','ID')->hideOnForm(),
            TextField::new('firstname','Prénom'),
            TextField::new('lastname','Nom'),
            EmailField::new('email','Email'),
            TextField::new('roles','Rôles'),
        ];
    }
    
=======

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'ID')->hideOnForm(),
            TextField::new('firstname', 'Prénom'),
            TextField::new('lastname', 'Nom'),
            EmailField::new('email', 'Email'),
            TextField::new('password')
                ->setFormType(RepeatedType::class)
                ->setFormTypeOptions(
                    [
                        'type' => PasswordType::class,
                        'first_options' => [
                            'label' => 'Password',
                            'hash_property_path' => 'password',
                        ],
                        'second_options' => ['label' => 'Confirm'],
                        'mapped' => false,
                    ]
                )
                ->onlyOnForms(),
            TextField::new('roles', 'Rôles')->hideOnIndex(),
        ];
    }
>>>>>>> 17354ff9a917947db5ea297c25544468a8e27f0e
}
