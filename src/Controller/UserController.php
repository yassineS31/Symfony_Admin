<?php

namespace App\Controller;

use App\Entity\Account;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AccountRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AccountType;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\AccountService;


final class UserController extends AbstractController
{
    public function __construct(
        private readonly AccountRepository $accountRepository,
        private readonly EntityManagerInterface $em,
        private readonly AccountService $accountService

    ) {}

    #[Route('/register', name: 'app_user_register')]
    public function register(): Response
    {
        return $this->render('user/register.html.twig');
    }

    #[Route('/login', name: 'app_user_login')]
    public function login(): Response
    {
        return $this->render('user/login.html.twig');
    }

    #[Route('/accounts', name: 'app_user_accounts')]
    // public function showAllAccounts(): Response
    // {
    //     return $this->render('user/accounts.html.twig', [
    //         "accounts" => $this->accountRepository->findAll()
    //     ]);
    // }
    public function showAllAccounts():Response{
        return $this->render('user/accounts.html.twig', [
                    "accounts" =>$this->accountService->getAll()
                 ]);
    }


    #[Route('/acount/new', name:'app_article_add')]

    public function addArticle(Request $resquest): Response
    {   
        
        $article = new Account();
        $form = $this->createForm(AccountType::class, $article);
        $form->handleRequest($resquest);
        $msg = "";
        $status ="";
        if($form->isSubmitted()){
            try {
                $this->em->persist($article);
                $this->em->flush();
                $msg = "Le compte a été ajoutée avec succès";
                $status = "success";
            } catch (\Exception $e) {
                $msg ="Le compte existe déja ". $e;
                $status = "danger";
            }
        }
        $this->addFlash($status, $msg);
        return $this->render('user/addAccount.html.twig',
        [
            'form'=> $form
        ]);
    }
}
