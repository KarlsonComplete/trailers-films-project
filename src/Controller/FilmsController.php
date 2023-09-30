<?php

namespace App\Controller;

use App\Repository\CountryRepository;
use App\Repository\FilmRepository;
use App\Repository\SubGenreRepository;
use App\Repository\YearRepository;
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
    public function index(Request $request, GenreRepository $genreRepository, SubGenreRepository $subGenreRepository, CountryRepository $countryRepository, YearRepository $yearRepository, FilmRepository $filmRepository): Response
    {
        $genres = $genreRepository->findAll();
        $countries = $countryRepository->findAll();
        $years = $yearRepository->findAll();
        $films = $filmRepository->findAll();


        if ($request->isXmlHttpRequest()) {
            if ($request->request->get('id_genre') && $request->request->get('id_subgenre') )
            {

                $films = $filmRepository->SearchFilmForOptionsTest2($request->request->get('id_genre'),$request->request->get('id_subgenre'));
                return new Response($this->twig->render('films/select.films.html.twig',['films' => $films]));

            }
            if ($request->request->get('id_genre')) {
                $subgenres = $subGenreRepository->SearchForIdenticalId($request->request->get('id_genre'));
                return new Response($this->twig->render('films/select.html.twig', ['subgenres' => $subgenres]));
            }
            if ($request->request->get('id_year'))
            {
                $films = $filmRepository->SearchForIdenticalId($request->request->get('id_year'));
                return new Response($this->twig->render('films/select.films.html.twig',['films' => $films]));
            }
        }

        return $this->render('films/index.html.twig',
            [
                'genres' => $genres,
                'countries' => $countries,
                'years' => $years,
                'films' => $films,
            ]);


    }
}
