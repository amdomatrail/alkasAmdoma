<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/react')]
class ReactController extends AbstractController
{
    #[Route('/babel', name: 'app_react_babel')]
    public function first(): Response
    {
        return $this->render('react/babel.html.twig');
    }

    #[Route('/composantJSX', name: 'app_react_composantJSX')]
    public function composantJSX(): Response
    {
        return $this->render('react/composantJSX.html.twig');
    }
    #[Route('/exoComposantJSX', name: 'app_react_exoComposantJSX')]
    public function exoComposantJSX(): Response
    {
        return $this->render('react/exoComposantJSX.html.twig');
    }

    #[Route('/node', name: 'node')]
    public function test(): Response
    {
        return $this->render('react/node.html.twig');
    }
}
