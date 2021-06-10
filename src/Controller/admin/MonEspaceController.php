<?php

namespace App\Controller\admin;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request) :Response {

        $admin = $this->getUser();

        
        
        if ($this->isCsrfTokenValid("editAdmin", $request->get('_token'))){
            $login = $request->request->get('username');
            $pwd = $request->request->get('password');
            $admin->setUsername($login);
            $admin->setPassword($this->encoder->encodePassword($admin, $pwd));
            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();
        }
        return new Response(content:$this->twig->render('admin/monEspace/monEspace.html.twig', [
            'loggedUser' => $this->getUser(),
        ]));

    }
}



?>