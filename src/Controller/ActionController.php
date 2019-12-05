<?php

namespace App\Controller;

use App\Entity\Action;
use App\Form\ActionType;
use App\Repository\ActionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contributeur;
use App\Entity\Animal;

/**
* @Route("/action")
*/
class ActionController extends AbstractController
{
/**
 * @Route("/", name="action_index", methods={"GET"})
 */
public function index(ActionRepository $actionRepository): Response
{
    return $this->render('action/index.html.twig', [
        'actions' => $actionRepository->findAll(),
    ]);
}

/**
 * @Route("/new", name="action_new", methods={"GET","POST"})
 */
public function new(Request $request): Response
{
    $action = new Action();
    $form = $this->createForm(ActionType::class, $action);
    $form->handleRequest($request);

    $entityManager = $this->getDoctrine()->getManager();

    if ($form->isSubmitted() && $form->isValid()) {
        if (($nom = $form->get('newContributeurNom')->getData()) &&
            ($adresse = $form->get('newContributeurAdresse')->getData()) &&
            ($codePostal = $form->get('newContributeurCodePostal')->getData()) &&
            ($ville = $form->get('newContributeurVille')->getData()))
        {
            $telephone = $form->get('newContributeurTelephone')->getData();
            $email = $form->get('newContributeurEmail')->getData();
            $remarque = $form->get('newContributeurRemarque')->getData();

            $contributeur = new Contributeur();
            $contributeur->setNom($nom);
            $contributeur->setAdresse($adresse);
            $contributeur->setCodePostal($codePostal);
            $contributeur->setVille($ville);
            $contributeur->setTelephone($telephone);
            $contributeur->setEmail($email);
            $contributeur->setRemarque($remarque);

            $entityManager->persist($contributeur);
            $entityManager->flush();

            $action->setContributeur($contributeur);
        }

        if (($famille = $form->get('newAnimalFamille')->getData()) &&
            ($nom = $form->get('newAnimalNom')->getData()) &&
            ($genre = $form->get('newAnimalGenre')->getData()))
        {
            $icad = $form->get('newAnimalIcad')->getData();
            $remarque = $form->get('newAnimalRemarque')->getData();

            $animal = new Animal();
            $animal->setFamille($famille);
            $animal->setNom($nom);
            $animal->setGenre($genre);
            $animal->setIcad($icad);
            $animal->setRemarque($remarque);

            $entityManager->persist($animal);
            $entityManager->flush();

            $action->setAnimal($animal);
        }

        $entityManager->persist($action);
        $entityManager->flush();

        return $this->redirectToRoute('action_index');
    }

    return $this->render('action/new.html.twig', [
        'action' => $action,
        'form' => $form->createView(),
    ]);
}

/**
 * @Route("/{id}", name="action_show", methods={"GET"})
 */
public function show(Action $action): Response
{
    return $this->render('action/show.html.twig', [
        'action' => $action,
    ]);
}

/**
 * @Route("/{id}/edit", name="action_edit", methods={"GET","POST"})
 */
public function edit(Request $request, Action $action): Response
{
    $form = $this->createForm(ActionType::class, $action);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('action_index');
    }

    return $this->render('action/edit.html.twig', [
        'action' => $action,
        'form' => $form->createView(),
    ]);
}

/**
 * @Route("/{id}", name="action_delete", methods={"DELETE"})
 */
public function delete(Request $request, Action $action): Response
{
    if ($this->isCsrfTokenValid('delete'.$action->getId(), $request->request->get('_token'))) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($action);
        $entityManager->flush();
    }

    return $this->redirectToRoute('action_index');
}
}
