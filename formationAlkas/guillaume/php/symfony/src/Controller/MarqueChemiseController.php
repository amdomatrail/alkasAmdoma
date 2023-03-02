<?php

namespace App\Controller;

use App\Entity\MarqueChemise;
use App\Form\MarqueChemiseType;
use App\Repository\MarqueChemiseRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/marque/chemise')]
class MarqueChemiseController extends AbstractController
{
    #[Route('/', name: 'app_marque_chemise_index', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function index(MarqueChemiseRepository $marqueChemiseRepository): Response
    {
        return $this->render('marque_chemise/index.html.twig', [
            'marque_chemises' => $marqueChemiseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_marque_chemise_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MarqueChemiseRepository $marqueChemiseRepository): Response
    {
        $marqueChemise = new MarqueChemise();
        $form = $this->createForm(MarqueChemiseType::class, $marqueChemise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $marqueChemise->setUser($this->getUser());
            $marqueChemiseRepository->save($marqueChemise, true);

            return $this->redirectToRoute('app_marque_chemise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('marque_chemise/new.html.twig', [
            'marque_chemise' => $marqueChemise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_marque_chemise_show', methods: ['GET'])]
    public function show(MarqueChemise $marqueChemise): Response
    {
        return $this->render('marque_chemise/show.html.twig', [
            'marque_chemise' => $marqueChemise,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_marque_chemise_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MarqueChemise $marqueChemise, MarqueChemiseRepository $marqueChemiseRepository): Response
    {
        $form = $this->createForm(MarqueChemiseType::class, $marqueChemise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $marqueChemiseRepository->save($marqueChemise, true);

            return $this->redirectToRoute('app_marque_chemise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('marque_chemise/edit.html.twig', [
            'marque_chemise' => $marqueChemise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_marque_chemise_delete', methods: ['POST'])]
    public function delete(Request $request, MarqueChemise $marqueChemise, MarqueChemiseRepository $marqueChemiseRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$marqueChemise->getId(), $request->request->get('_token'))) {
            $marqueChemiseRepository->remove($marqueChemise, true);
        }

        return $this->redirectToRoute('app_marque_chemise_index', [], Response::HTTP_SEE_OTHER);
    }
}
