<?php

namespace App\Controller\admin;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\EtablissementRepository;
use App\Repository\TemoignageRepository;
use Twig\Environment;


class AdminController extends AbstractController {


    public function __construct(Environment $twig, EtablissementRepository $EtablissementRepository, TemoignageRepository $temoignageRepository)
    {
        $this->TemoignageRepository = $temoignageRepository;
        $this->EtablissementRepository = $EtablissementRepository;
        $this->twig = $twig;
    }

    /**
     * @Route ("/Admin", name="admin")
     * @return Response
     */
    public function index() :Response {

        return $this->render('admin/tableauDeBord.html.twig', [
            'nbEtablissement' => count($this->EtablissementRepository->findAll()),
            'nbTemoignage' => count($this->TemoignageRepository->findAll()),
            'loggedUser' => $this->getUser()
        ]);

    }
}



?>