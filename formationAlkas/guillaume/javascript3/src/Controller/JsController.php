<?php



class JsController extends Controller
{
    public function calculatrice()
    {
        $this->render('js/calculatrice');
    }

    public function calculatriceB()
    {
        $this->render('js/calculatriceB');
    }

    public function doWhile()
    {
        $this->render('js/doWhile');
    }

    public function event()
    {
        $this->render('js/event', [
            'titre' => 'Exo event',
            'description' => "Exo sur les évenements"
        ]);
    }

    public function todo()
    {
        $this->render('js/todo');
    }

    public function shifumi()
    {
        $this->render('js/shifumi');
    }

    public function tousExos()
    {
        $this->render('js/tousExos');
    }
    public function formulaire()
    {
        $this->render('js/formulaire');
    }
    public function json()
    {
        $this->render('js/json');
    }
    public function liste()
    {
        $this->render('js/liste');
    }
    public function ajax()
    {
        $this->render('js/ajax');
    }
    public function meteo()
    {
        $this->render('js/meteo');
    }
    public function carte()
    {
        $this->render('js/carte');
    }
    public function shifu()
    {
        $this->render('js/shifu');
    }

    public function formContact(array $data):string
    {
        $messageErreur = "merci de bien saisir toutes les informations du formulaire";
//        http_response_code(301);
        // traite les données de $data
        if ($data && !empty($data['email']) && !empty($data['message'])) {

            if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL) || strlen(trim ($data['message'])) <10) {

                $retourJson = [
                    'message' => $messageErreur,
                    'mail' => false
                ];
            } else {
                // j'envoie mon mail
                //mail($data['email'], 'mail de mon site', $data['message']);
//                http_response_code(200);

                $retourJson = [
                    'message'=>'le mail est bien envoyé',
                    'mail' =>true
                ];
            }

        } else {
            $retourJson = [
                'message' => $messageErreur,
                'mail' => false
            ];
        }

        header('Content-Type: application/json; charset=utf-8');
        die(json_encode($retourJson));
    }

}