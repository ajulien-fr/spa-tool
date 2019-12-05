<?php

namespace App\Controller;

use App\Entity\Contributeur;
use App\Form\ContributeurType;
use App\Repository\ContributeurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contributeur")
 */
class ContributeurController extends AbstractController
{
    /**
     * @Route("/", name="contributeur_index", methods={"GET"})
     */
    public function index(ContributeurRepository $contributeurRepository): Response
    {
        return $this->render('contributeur/index.html.twig', [
            'contributeurs' => $contributeurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="contributeur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $contributeur = new Contributeur();
        $form = $this->createForm(ContributeurType::class, $contributeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contributeur);
            $entityManager->flush();

            return $this->redirectToRoute('contributeur_index');
        }

        return $this->render('contributeur/new.html.twig', [
            'contributeur' => $contributeur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contributeur_show", methods={"GET"})
     */
    public function show(Contributeur $contributeur): Response
    {
        return $this->render('contributeur/show.html.twig', [
            'contributeur' => $contributeur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contributeur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contributeur $contributeur): Response
    {
        $form = $this->createForm(ContributeurType::class, $contributeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contributeur_index');
        }

        return $this->render('contributeur/edit.html.twig', [
            'contributeur' => $contributeur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contributeur_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Contributeur $contributeur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contributeur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contributeur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contributeur_index');
    }
}
