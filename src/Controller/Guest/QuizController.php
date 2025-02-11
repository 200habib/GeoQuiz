<?php

namespace App\Controller\Guest;

use App\Entity\Quiz;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\QuizRepository;

class QuizController extends AbstractController
{
    #[Route('/quiz/{id}', name: 'quiz_show')]
    public function show(int $id, QuizRepository $quizRepository): Response
    {
        // Recupera il quiz tramite l'id
        $quiz = $quizRepository->find($id);

        if (!$quiz) {
            throw $this->createNotFoundException('Il quiz con id ' . $id . ' non esiste.');
        }

        // Passa il quiz alla vista per mostrarlo
        return $this->render('Guest/quiz/index.html.twig', [
            'quiz' => $quiz,
        ]);
    }
}
