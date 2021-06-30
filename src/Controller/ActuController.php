<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use App\Repository\ActuRepository;

class ActuController extends AbstractController
{


    public function __construct(Environment $twig, ActuRepository $actuRepository)
    {
        $this->twig = $twig;
        $this->actuRepository = $actuRepository;
    }

    /**
     * @Route ("/Actualité/{id}", name="this_actu")
     * @return Response
     */
    public function thisActu($id){
        
        $Actu = $this->actuRepository->find($id);
        return $this->render('pages/thisActu.html.twig', [
            'actu' => $Actu,
        ]);
    }
}
?>