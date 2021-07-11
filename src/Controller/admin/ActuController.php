<?php

namespace App\Controller\admin;

use App\Entity\Actu;
use App\Form\ActuFormType;
use App\Repository\ActuRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActuController extends AbstractController
{
    public function __construct(ActuRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @Route ("/Admin/Actus", name="gestion_actus")
     * @return Response
     */
    public function ShowActu(PaginatorInterface $paginator, Request $request): Response
    {

        $actus = $paginator->paginate(
            $this->repository->findBy(array(), array('created_at' => 'DESC')),
            $request->query->getInt('page', 1),
            12
        );

        return $this->render('admin/actus/ShowActus.html.twig', [
            'actus' => $actus,
            'loggedUser' => $this->getUser(),
        ]);
    }

    /**
     * @Route ("/Admin/NouveauActu", name="create_actu")
     * @return Response
     */
    public function createActu(Request $request){

        $actu = new Actu;
        $form = $this->createForm(ActuFormType::class, $actu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($actu);
            $em->flush();
            return $this->redirectToRoute('gestion_actus');
        }
        return $this->render('admin/actus/CreateActu.html.twig', [
            'actu' => $actu,
            'loggedUser' => $this->getUser(),
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route ("/Admin/Actus/{id}", name="edit_actu")
     * @return Response
     */
    public function editActu(Actu $actu, Request $request){
        $form = $this->createForm(ActuFormType::class, $actu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('gestion_actus');
        }
        return $this->render('admin/actus/EditActu.html.twig', [
            'actu' => $actu,
            'loggedUser' => $this->getUser(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route ("/Admin/Actu/{id}", name="delete_actu", methods="DELETE")
     * @return Response
     */
    public function deleteActu(Actu $actu, Request $request){

        if ($this->isCsrfTokenValid("delete", $request->get('_token'))){
            $em = $this->getDoctrine()->getManager();
            $em->remove($actu);
            $em->flush();
        }
        
        return $this->redirectToRoute('gestion_actus');
    }

}
