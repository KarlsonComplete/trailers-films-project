<?php

namespace App\Controller;

use App\Repository\SubGenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request, GenreRepository $genreRepository, SubGenreRepository $subGenreRepository): Response
    {
        $genres = $genreRepository->findAll();

        if ($request->isXmlHttpRequest()) {
            if ($request->request->get('id_genre')) {
                $subgenres = $subGenreRepository->SearchForIdenticalId($request->request->get('id_genre'));
                return new Response($this->twig->render('films/select.html.twig', ['subgenres' => $subgenres]));
            }
        }

        return $this->render('films/index.html.twig',
            [
                'genres' => $genres,
            ]);


    }
}
