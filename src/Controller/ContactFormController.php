<?php

namespace App\Controller;

use App\Entity\ContactForm;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\ChoiceList\EntityLoaderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactFormController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/contact', name: 'app_contact_form')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

        $contact = new ContactForm();
        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Ici, vous traitez les données du formulaire, par exemple, sauvegarder dans la base de données
            $this->entityManager;
            $entityManager->persist($contact);
            $entityManager->flush();

            // Après traitement, rediriger vers une autre page ou afficher un message de succès
            return $this->redirectToRoute('app_home');
        }

        return $this->render('contact_form/index.html.twig', [
            'controller_name' => 'ContactFormController',
            'contact_form' => $form->createView()
        ]);
    }
}
