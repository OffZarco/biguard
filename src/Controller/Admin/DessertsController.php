<?php

namespace App\Controller\Admin;

use App\Entity\Desserts;
use App\Form\DessertsType;
use App\Repository\DessertsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/desserts')]
class DessertsController extends AbstractController
{
    #[Route('/', name: 'app_admin_desserts_index', methods: ['GET'])]
    public function index(DessertsRepository $dessertsRepository): Response
    {
        return $this->render('admin/desserts/index.html.twig', [
            'desserts' => $dessertsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_desserts_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $dessert = new Desserts();
        $form = $this->createForm(DessertsType::class, $dessert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($dessert);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_desserts_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/desserts/new.html.twig', [
            'dessert' => $dessert,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_desserts_show', methods: ['GET'])]
    public function show(Desserts $dessert): Response
    {
        return $this->render('admin/desserts/show.html.twig', [
            'dessert' => $dessert,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_desserts_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Desserts $dessert, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DessertsType::class, $dessert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_desserts_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/desserts/edit.html.twig', [
            'dessert' => $dessert,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_desserts_delete', methods: ['POST'])]
    public function delete(Request $request, Desserts $dessert, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dessert->getId(), $request->request->get('_token'))) {
            $entityManager->remove($dessert);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_desserts_index', [], Response::HTTP_SEE_OTHER);
    }
}
