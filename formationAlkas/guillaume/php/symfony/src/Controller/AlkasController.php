<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlkasController extends AbstractController
{
    #[Route('/alkas', name: 'app_alkas')]
    public function index(): Response
    {
        $premierChamp = 'vide';

        if ($request->request->count()) {
            if ($request->request->get('premierChamp')) {
                $premierChamp = $request->request->get('premierChamp').'âs vide';
            }
        }
        return $this->render('alkas/index.html.twig', [
            'controller_name' => 'Mon test',
        ]);
    }
    #[Route('/formulaire',name:'formulaire')]
    public function formulaire(Request $request) : Response
    {

        return $this->render('alkas/formulaire.twig',[
            'premierChamp' => 'ma valeur',
            'nombre'=>$request->request->count()
        ]);
    }
    #[Route('/formulaire/second',name:'formulaireScecond')]
    public function formulaireSecond(Request $r) : Response
    {
        $form =
            $this->createFormBuilder()
            ->add('premierChamp')
            ->add('secondChamp')
            ->setMethod('post')
            ->getForm();
        $form->handleRequest($r);
//        handleRequest($r) permet de mettre une valeur par défault dans les champs ( value)

        if($form->isSubmitted() && $form->isValid()) {
            $recupPremier = $r->request->get('premierChamp');
            $dataForm = $form->getData();
//            $this->pleinDeParam($dataForm,$recupPremier);
            dd($dataForm, $recupPremier);
        }
        return $this->render('alkas/formulaireSecond.twig',[
            'form' => $form->createView()

            ]
        );
    }

//    private function pleinDeParam(...$test) : void
//    {
//        dd($test);
//    }
}
