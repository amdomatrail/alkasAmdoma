<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\VoitureType;
use App\Repository\VoitureRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/voiture')]
class VoitureController extends AbstractController
{

    #[Route('/new', name: 'app_voiture_new', methods: ['GET', 'POST'])]
    public function new(Request $request, VoitureRepository $voitureRepository): Response
    {
        $voiture = new Voiture();
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $voitureRepository->save($voiture, true);

            return $this->redirectToRoute('app_voiture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('voiture/new.html.twig', [
            'voiture' => $voiture,
            'form' => $form,
        ]);
    }


    #[Route('/findBy', name: 'app_voiture_findBy', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function findBy(VoitureRepository $voitureRepository): Response
    {

        return $this->render('voiture/findBy.html.twig', [
            'voitures' => $voitureRepository->findBy(['nom' =>'Jaguar']),
        ]);
    }

    #[Route('/findOneBy', name: 'app_voiture_findOneBy', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function findOneBy(VoitureRepository $voitureRepository): Response
    {
        return $this->render('voiture/findOneBy.html.twig', [
            'voitures' => $voitureRepository->findOneBy([
                'id' =>'3']),
        ]);
    }
    #[Route('/find', name: 'app_voiture_find', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function find(VoitureRepository $voitureRepository): Response
    {
        return $this->render('voiture/find.html.twig', [
            'voitures' => $voitureRepository->find(2),
        ]);
    }
    #[Route('/findAll', name: 'app_voiture_findAll', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function findAll(VoitureRepository $voitureRepository): Response
    {
        return $this->render('voiture/findAll.html.twig', [
            'voitures' => $voitureRepository->findAll(),
        ]);
    }
    #[Route('/index', name: 'app_voiture_index', methods: ['GET'])]
    public function index(VoitureRepository $voitureRepository): Response
    {
        return $this->render('voiture/index.html.twig', [
        'voitures' => $voitureRepository->findAll(),
        ]);
    }
    #[Route('/{id}', name: 'findByIdSlug',requirements:['id'=>'\d+'], methods: ['GET'])]
    public function findByIdSlug(Voiture $voiture): Response
    {

        return $this->render('voiture/findByIdSlug.html.twig', [
            'voiture' => $voiture,
            'menuExo' => true,
            'menuFindByIdSlug' => true,

            ]);

    }
    #[Route('/{nom}', name: 'findByNomSlug', methods: ['GET'])]
    public function findByNomSlug(Voiture $voiture): Response
    {

        return $this->render('voiture/findByNomSlug.html.twig', [
            'voiture' => $voiture]);
    }

    #[Route('/{id}', name: 'app_voiture_show', methods: ['GET'])]
    public function show(Voiture $voiture): Response
    {
        return $this->render('voiture/show.html.twig', [
            'voiture' => $voiture,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_voiture_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Voiture $voiture, VoitureRepository $voitureRepository): Response
    {
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $voitureRepository->save($voiture, true);

            return $this->redirectToRoute('app_voiture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('voiture/edit.html.twig', [
            'voiture' => $voiture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_voiture_delete', methods: ['POST'])]
    public function delete(Request $request, Voiture $voiture, VoitureRepository $voitureRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$voiture->getId(), $request->request->get('_token'))) {
            $voitureRepository->remove($voiture, true);
        }

        return $this->redirectToRoute('app_voiture_index', [], Response::HTTP_SEE_OTHER);
    }


}
