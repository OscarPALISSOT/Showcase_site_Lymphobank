<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class CestQuoiController extends AbstractController
{


    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }



    /**
     * @Route ("/Qu-est-ce-que-le-don", name="cestquoi")
     * @return Response
     */
    public function index() : Response{

        return $this->render('pages/CestQuoi.html.twig');
    }
}
?>