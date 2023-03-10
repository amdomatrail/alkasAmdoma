<?php

namespace App\Controller;

use App\Entity\Chemise;
use App\Form\ChemiseType;
use App\Repository\ChemiseRepository;
use App\Repository\MarqueChemiseRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/chemise')]
class ChemiseController extends AbstractController
{
    #[Route('/', name: 'app_chemise_index', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function index(ChemiseRepository $chemiseRepository): Response
    {

        return $this->render('chemise/index.html.twig', [
            'chemises' => $chemiseRepository->findBy(['user' => $this->getUser()->getId()]),
        ]);
    }

    #[Route('/new', name: 'app_chemise_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function new(Request $request, ChemiseRepository $chemiseRepository): Response
    {
        $chemise = new Chemise();
        $form = $this->createForm(ChemiseType::class, $chemise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $chemise->setUser($this->getUser());
            $chemiseRepository->save($chemise, true);

            return $this->redirectToRoute('app_chemise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chemise/new.html.twig', [
            'chemise' => $chemise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_chemise_show', methods: ['GET'])]
    public function show(Chemise $chemise): Response
    {

        return $this->render('chemise/show.html.twig', [
            'chemise' => $chemise,
        ]);
    }
//    #[Route('/{id}', name: 'app_chemise_toast', methods: ['GET'])]
//    public function toast(Chemise $chemise): Response
//    {
//        return $this->render('chemise/toast.html.twig', [
//            'chemise' => $chemise,
//        ]);
//    }
    #[Route('/{id}/edit', name: 'app_chemise_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function edit(Request $request, Chemise $chemise, ChemiseRepository $chemiseRepository): Response
    {

        try {
            $this->denyAccessUnlessGranted('modifChemise', $chemise);
        } catch (\Exception $e) {
            if ($e->getCode() === 403) {
                $this->addFlash("warning", "il y a une erreur de chemise");
            } else {
                $this->addFlash('error', $e->getMessage());
            }
            return $this->redirectToRoute('home');
        }
        $form = $this->createForm(ChemiseType::class, $chemise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chemiseRepository->save($chemise, true);

            return $this->redirectToRoute('app_chemise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chemise/edit.html.twig', [
            'chemise' => $chemise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_chemise_delete', methods: ['POST'])]
    public function delete(Request $request, Chemise $chemise, ChemiseRepository $chemiseRepository): Response
    {
        try {
            $this->denyAccessUnlessGranted('deleteChemise', $chemise);
        } catch (\Exception $e) {

            if ($e->getCode() === 403) {

                $this->addFlash("warning", "il y a une erreur de suppression");

            } else {
                $this->addFlash('error', $e->getMessage());
            }
            return $this->redirectToRoute('home');
        }

        if ($this->isCsrfTokenValid('delete' . $chemise->getId($this->getUser()), $request->request->get('_token'))) {
            $chemiseRepository->remove($chemise, true);
        }

       return $this->redirectToRoute('app_chemise_index', [], Response::HTTP_SEE_OTHER);
   }

}
