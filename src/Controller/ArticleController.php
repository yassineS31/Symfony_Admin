<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;



final class ArticleController extends AbstractController
{
    public function __construct(
        private readonly ArticleRepository $articleRepository,
        private readonly EntityManagerInterface $em

    )
    {
    }


    #[Route('/articles', name: 'app_article_all')]
    public function showAllArticles(): Response
    {
        return $this->render('article/show_all_articles.html.twig', [
            "articles" => $this->articleRepository->findAll(),
        ]);
    }


    #[Route('/article/add', name: 'app_article_add')]

    public function addArticle(Request $resquest): Response
    {   
        
        $article = new Article();
        $form = $this->createForm(articleType::class, $article);
        $form->handleRequest($resquest);
        $msg = "";
        $status ="";
        if($form->isSubmitted()){
            try {
                $this->em->persist($article);
                $this->em->flush();
                $msg = "L'article a été ajoutée avec succès";
                $status = "success";
            } catch (\Exception $e) {
                $msg ="L'article existe déja ". $e;
                $status = "danger";
            }
        }
        $this->addFlash($status, $msg);
        return $this->render('article/addArticle.html.twig',
        [
            'form'=> $form
        ]);
    }

    // #[Route('/article/{id}', name: 'app_article_show')]
    // public function showArticle(int $id): Response
    // {
    //     return $this->render('article/show_article.html.twig', [
    //         "article" => $this->articleRepository->find($id),
    //     ]);
    // }
}
