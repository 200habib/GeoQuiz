<?php

namespace App\Controller\Guest;

use App\Entity\Category;
use App\Entity\Quiz;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


final class QuizCategoryController extends AbstractController
{
    #[Route('/category/quiz/{id}', name: 'app_quiz_category')]
    public function index(int $id, EntityManagerInterface $entityManager): Response
    {
        $category = $entityManager->getRepository(Category::class)->find($id);

        if (!$category) {
            throw $this->createNotFoundException('Category not found.');
        }
        
        $quizzes = $entityManager->getRepository(Quiz::class)->findBy(['category' => $category]);

        return $this->render('Guest/quiz_category/index.html.twig', [
            'category' => $category,
            'quizzes' => $quizzes,
        ]);
        
    }
}
