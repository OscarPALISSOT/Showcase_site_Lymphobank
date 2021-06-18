<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class AboutController extends AbstractController
{


    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }



    /**
     * @Route ("/Qui-sommes-nous", name="about")
     * @return Response
     */
    public function index() : Response{

        return new Response(content: $this->twig->render('pages/about.html.twig', [
            
        ]));
    }
}
?>