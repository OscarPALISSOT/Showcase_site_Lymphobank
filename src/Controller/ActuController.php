<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ActuRepository;
use Knp\Component\Pager\PaginatorInterface;

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


    /**
     * @Route ("/Actualité", name="show_actu")
     * @return Response
     */
    public function showActu(PaginatorInterface $paginator, Request $request){
        
        $actus = $paginator->paginate(
            $this->actuRepository->findBy(array(), array('created_at' => 'DESC')),
            $request->query->getInt('page', 1),
            12
        );

        return $this->render('pages/showActus.html.twig', [
            'actus' => $actus,
        ]);
    }
}
?>