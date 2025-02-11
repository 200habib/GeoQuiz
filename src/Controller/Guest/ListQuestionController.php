<?php

namespace App\Controller\Guest;

use App\Entity\Question;
use App\Entity\Quiz;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;



final class ListQuestionController extends AbstractController
{
    #[Route('/list/question/{id}', name: 'app_list_question')]
    public function index(int $id, EntityManagerInterface $entityManager): Response
    {
        $quiz = $entityManager->getRepository(Quiz::class)->find($id);
        

        if (!$quiz) {
            throw $this->createNotFoundException('Quiz non trovato.');
        }

        return $this->render('list_question/index.html.twig', [
            'quiz' => $quiz,
        ]);
    }
}
