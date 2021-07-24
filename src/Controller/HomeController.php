<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\TemoignageRepository;
use Twig\Environment;
use App\Repository\EtablissementRepository;
use App\Repository\ActuRepository;

class HomeController extends AbstractController {


    public function __construct(Environment $twig, TemoignageRepository $temoignageRepository, EtablissementRepository $etablissementRepository, ActuRepository $actuRepository)
    {
        $this->twig = $twig;
        $this->temoignageRepository = $temoignageRepository;
        $this->etablissementRepository = $etablissementRepository;
        $this->actuRepository = $actuRepository;
    }

    public function index() : Response{

        $temoignages = $this->temoignageRepository->findBy(array(), array('ordre' => 'ASC'));
        $etablissements = $this->etablissementRepository->findAll();
        $featuredActus = $this->actuRepository->findFeatured();
        return $this->render('pages/home.html.twig', [
            'temoignages' => $temoignages,
            'etablissements' => $etablissements,
            'featuredActus' => $featuredActus
        ]);
    }


}
?>