<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(TaskRepository $taskRepository): Response
    {
        $tasks = $taskRepository->findAll(); // ou ->findBy(['status' => false]) pour les non terminées

        return $this->render('home/index.html.twig', [
            'tasks' => $tasks,
        ]);
    }
}
