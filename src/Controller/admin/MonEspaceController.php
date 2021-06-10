<?php

namespace App\Controller\admin;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AdminsFormType;
use App\Entity\Admins;
use Twig\Environment;


class MonEspaceController extends AbstractController {


    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route ("Admin/MonEspace/{id}", name="monEspace")
     * @return Response
     */
    public function index(Admins $admin, Request $request) :Response {

        $form = $this->createForm(AdminsFormType::class, $admin);

        return new Response(content:$this->twig->render('admin/monEspace/monEspace.html.twig', [
            'loggedUser' => $this->getUser(),
            'form' => $form->createView(),
        ]));

    }
}



?>