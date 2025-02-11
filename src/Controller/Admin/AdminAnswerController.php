<?php

namespace App\Controller\Admin;


use App\Form\AnswerCollectionType;

use App\Entity\Quiz;

use App\Entity\Question;
use App\Entity\Answer;
use App\Form\AnswerType;
use App\Repository\AnswerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/answer')]
final class AdminAnswerController extends AbstractController
{
    #[Route(name: 'app_answer_index', methods: ['GET'])]
    public function index(AnswerRepository $answerRepository, EntityManagerInterface $entityManager): Response
    {

        $quiz = $entityManager->getRepository(Quiz::class)->findAll();
        $question = $entityManager->getRepository(Question::class)->findAll();

        return $this->render('Admin/AdminAnswer/index.html.twig', [
            'answers' => $answerRepository->findAll(),
            'quizzes' => $quiz,
            'questions' => $question,
        ]);
    }

    #[Route('/new', name: 'app_answer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $answers = [new Answer(), new Answer(), new Answer()]; 
        $form = $this->createForm(AnswerCollectionType::class, ['answers' => $answers]);

        $quiz = $entityManager->getRepository(Quiz::class)->findAll();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($form->getData()['answers'] as $answer) {
                $entityManager->persist($answer);
            }
            $entityManager->flush();

            return $this->redirectToRoute('some_route');
        }

        return $this->render('Admin/AdminAnswer/new.html.twig', [
            'form' => $form->createView(),
            'quiz' => $quiz,
        ]);
    }

    #[Route('/{id}', name: 'app_answer_show', methods: ['GET'])]
    public function show(Answer $answer): Response
    {
        return $this->render('Admin/AdminAnswer/show.html.twig', [
            'answer' => $answer,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_answer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Answer $answer, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_answer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Admin/AdminAnswer/edit.html.twig', [
            'answer' => $answer,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_answer_delete', methods: ['POST'])]
    public function delete(Request $request, Answer $answer, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$answer->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($answer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_answer_index', [], Response::HTTP_SEE_OTHER);
    }
}
