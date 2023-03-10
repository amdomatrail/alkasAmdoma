<?php

namespace App\Controller;

use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Article;
class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog')]
    public function index(ArticleRepository $repo)
    {

        $articles = $repo->findAll();
        return $this->render('blog/index.html.twig',[
            'controller_name' => 'BlogController',
            'articles'=>$articles
        ]);
    }
    #[Route('/', name: 'home')]
    public function home () {
        return $this ->render('blog/home.html.twig');
    }
    #[Route("/blog/{id}/edit", name: "blog_edit",requirements:['id'=>'\d+'])]
    #[Route("/blog/new", name: "blog_create")]
    public function form(Article $article=null,Request $request,EntityManagerInterface $manager){

        if (!$article) {
            $article = new Article();
        }
        $form = $this ->createForm(ArticleType::class,$article);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if(!$article->getId()) {
                $article->setCreateAt(new \DateTime());
            }

            $manager->persist($article);
            $manager->flush();
            return $this->redirectToRoute('blog_show',['id' => $article->getId()]);
        }

        return $this->render('blog/create.html.twig',[
            'formArticle' => $form->createView(),
            'editMode' => $article->getId() !== null,
        ]);
    }
    #[Route('/blog/{id}', name: 'blog_show')]
    public function show(ArticleRepository $repo,$id):Response
    {
        $article = $repo->find($id);
        return $this->render('blog/show.html.twig',[
            'article' => $article,
        ]);
    }
}
