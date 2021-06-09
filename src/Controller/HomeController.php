<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\TemoignageRepository;
use Twig\Environment;
use App\Repository\EtablissementRepository;

class HomeController extends AbstractController {


    public function __construct(Environment $twig, TemoignageRepository $temoignageRepository, EtablissementRepository $etablissementRepository)
    {
        $this->twig = $twig;
        $this->temoignageRepository = $temoignageRepository;
        $this->etablissementRepository = $etablissementRepository;
    }

    public function index() : Response{

        $temoignages = $this->temoignageRepository->findAll();
        $etablissements = $this->etablissementRepository->findAll();
        return new Response(content: $this->twig->render('pages/home.html.twig', [
            'temoignages' => $temoignages,
            'etablissements' => $etablissements
        ]));
    }


}
?>