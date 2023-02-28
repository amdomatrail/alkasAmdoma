<?php

namespace App\Controller;
use App\Entity\Voiture;
use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/exo')]
class ExoController extends AbstractController
{
    #[Route('/firstexo', name: 'firstexo')]
    public function index(): Response
    {
        return $this->render('/index.html.twig', [
            'controller_name' => '50 ans c\'est le Top',
            'titre' => 'c\'est ton anniversaire !!!'
        ]);
    }

    #[Route('/todo', name: 'todo')]
    public function todo(): Response
    {
        return $this->render('exo/todo.html.twig');
    }
    #[Route('/meteo', name: 'meteo')]
    public function meteo(): Response
    {
        return $this->render('exo/meteo.html.twig');
    }

    #[Route('/formulaire/inscription', name: 'formulaireInscription')]
    public function formulaireInscription(Request $r): Response
    {
        $targetEmail = 'myemail@gmail.com';
        $subject = 'le mail a été envoyé !!!';
        $message = 'es-tu d\'accord ?';
        $isSub = false;
        $testNom=false;
        $testPrenom =false;
        $testLogin=false;
        $email = false;
        $password=false;
        $messageNom = '';
        $messagePrenom ='';
        $form =
            $this->createFormBuilder()
                ->add('nom',TextType::class)
                ->add('prenom',TextType::class)
                ->add('email',EmailType::class)
                ->add('login',TextType::class)
                ->add('password',PasswordType::class)
                ->setMethod('post')
                ->getForm();
        $form->handleRequest($r);

        if ($form->isSubmitted() && $form->isValid()) {
//            $recupPremier = $r->request->get('premierChamp');
            $isSub = true;
            $message ='';
            $dataForm = $form->getData();
            $email = trim($dataForm['email']);
            $nom = trim($dataForm['nom']);
            $prenom = trim($dataForm['prenom']);
            $login = trim($dataForm['login']);
            $testPass = trim($dataForm['password']);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message .= '';
            } else {
                $message .= 'le champ mail n\'est pas ok' ;
                $email = false;
            }
            if(empty($testPass)) {
                $message .=' ça ne marche pas';
            } else {
                $password = password_hash($testPass,PASSWORD_ARGON2ID);
            }
            if (strlen($nom)>2 && strlen($nom)<11) {
                $testNom = true;
            } else {
                $testNom = false;
                $messageNom = 'taille du nom est invalid (entre 3 et 10 caract)';
            }
            if (strlen($prenom)>2 && strlen($prenom)<11) {
                $testPrenom = true;
            } else {
                $testPrenom = false;
                $messagePrenom = 'taille du prénom est invalid (entre 3 et 10 caract)';
            }
            if ($login) {
                $testLogin = true;
                         }
                 } else {
            $isSub = false;
            $message .= 'les champs ne sont pas remplis';
                    }

//            dd($resultatEmail);

        return $this->render('exo/formulaireInscription.twig', [
                'form' => $form->createView(),
                'isSub' => $isSub,
                'testNom' => $testNom,
                'testPrenom' => $testPrenom,
                'email' => $email,
                'testLogin' => $testLogin,
                'password' => $password,
                'message' => $message,
                'messageNom' => $messageNom,
                'messagePrenom' =>$messagePrenom,
            ]
        );
    }
}
