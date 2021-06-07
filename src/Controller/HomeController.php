<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\TemoignageRepository;
use Twig\Environment;

class HomeController extends AbstractController {


    public function __construct(Environment $twig, TemoignageRepository $repository)
    {
        $this->twig = $twig;
        $this->repository = $repository;
    }

    public function index() : Response{

        $temoignages = $this->repository->findAll();
        return new Response(content: $this->twig->render('pages/home.html.twig', [
            'temoignages' => $temoignages,
        ]));
    }


}
?>