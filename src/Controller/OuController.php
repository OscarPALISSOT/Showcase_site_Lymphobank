<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use App\Repository\EtablissementRepository;

class OuController extends AbstractController
{


    public function __construct(Environment $twig, EtablissementRepository $Repository)
    {
        $this->twig = $twig;
        $this->Repository = $Repository;
    }



    /**
     * @Route ("/Ou", name="ou")
     * @return Response
     */
    public function index() : Response{

        $etablissements = $this->Repository->findAll();
        return new Response(content: $this->twig->render('pages/ou.html.twig', [
            'etablissements' => $etablissements
        ]));
    }
}
?>