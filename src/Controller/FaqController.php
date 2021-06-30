<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FaqRepository;
use Twig\Environment;

class FaqController extends AbstractController
{
    
    public function __construct(Environment $twig, FaqRepository $repository)
    {
        $this->twig = $twig;
        $this->repository = $repository;
    }



    /**
     * @Route ("/F.A.Q", name="faq")
     * @return Response
     */
    public function index() : Response{

        $faqs = $this->repository->findBy(array(), array('ordre' => 'ASC'));
        return $this->render('pages/Faq.html.twig', [
            'faqs' => $faqs,
        ]);
    }
}
?>