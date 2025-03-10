<?php

namespace App\Form;

use App\Entity\Article;
use DateTime;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;




class ArticleType extends AbstractType

    
    {
        public function buildForm(FormBuilderInterface $builder, array $options): void
        {
            $builder
                ->add('title', TextType::class, [
                    'label' => 'Nom de l\'article',
                    'attr' => [
                        'placeholder' => 'Saisir le titre'   
                    ]
                ])
                ->add('content', TextareaType::class, [
                    'label' => 'Contenu de l\'article',
                    'attr' => [
                        'placeholder' => 'Écrivez ici votre article'
                    ]
                ])
                ->add('createAt', DateTime::class, [
                    'label' => 'date',
                ])
                ->add('save', SubmitType::class, [
                    'label' => 'Ajouter'
                ])
            ;
        }
    
        public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([
                'data_class' => Article::class,
            ]);
        }
    }
    

     function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
