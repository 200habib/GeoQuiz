<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminDashBoardController extends AbstractController
{
    #[Route('admin/dashBoard', name: 'app_dash_board')]
    public function index(): Response
    {
        return $this->render('Admin/AdminDashBoard/index.html.twig', [
            'controller_name' => 'DashBoardController',
        ]);
    }
}
