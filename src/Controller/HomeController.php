<?php

namespace App\Controller;

use App\Repository\DessertsRepository;
use App\Repository\EntreeRepository;
use App\Repository\PlatsRepository;
use DateTime;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntreeRepository $entreeRepository, PlatsRepository $platsRepository, DessertsRepository $dessertsRepository): Response
    {

        // Entrées
        $entrees = $entreeRepository->findAll();

        // Plats
        $plats = $platsRepository->findAll();

        // Desserts
        $desserts = $dessertsRepository->findAll();

        // Images Carousel
        $finder = new Finder();
        $finder->files()->in($this->getParameter('kernel.project_dir') . '/public/images/gallery/');

        $images = [];
        foreach ($finder as $file) {
            $images[] = $file->getRelativePathname();
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'images' => $images,
            'entrees' => $entrees,
            'plats' => $plats,
            'desserts' => $desserts
        ]);
    }
}
