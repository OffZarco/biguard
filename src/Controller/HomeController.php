<?php

namespace App\Controller;

use App\Repository\DessertsRepository;
use App\Repository\EntreeRepository;
use App\Repository\PlatsRepository;
use App\Repository\QuestionsRepository;
use DateTime;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(QuestionsRepository $questionsRepository): Response
    {
        // Questions
        $questions = $questionsRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'questions'=>$questions,
        ]);
    }
}
