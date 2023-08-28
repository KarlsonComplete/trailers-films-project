<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use App\Repository\GenreRepository;

class FilmsController extends AbstractController
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    #[Route('/films', name: 'app_main')]
    public function index(Environment $twig, GenreRepository $genreRepository): Response
    {
       return new Response($this->twig->render('films/index.html.twig', [
           'genres' => $genreRepository->findAll(),
       ]));
    }
}
