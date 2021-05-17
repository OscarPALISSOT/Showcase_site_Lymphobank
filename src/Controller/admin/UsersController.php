<?php

namespace App\Controller\admin;

use App\Entity\Admins;
use App\Form\AdminsFormType;
use App\Repository\AdminsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    public function __construct(AdminsRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @Route ("/Admin/Admins", name="gestion_admins")
     * @return Response
     */
    public function ShowAdmins(PaginatorInterface $paginator, Request $request): Response
    {

        $admins = $paginator->paginate(
            $this->repository->findAll(),
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('admin/admins/ShowAdmins.html.twig', [
            'admins' => $admins,
        ]);
    }

    /**
     * @Route ("/Admin/NouveauAdmins", name="create_admin")
     * @return Response
     */
    public function createAdmins(Request $request){

        $admin = new Admins;
        $form = $this->createForm(AdminsFormType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();
            return $this->redirectToRoute('gestion_admins');
        }
        return $this->render('admin/admins/CreateAdmins.html.twig', [
            'admin' => $admin,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route ("/Admin/Admins/{id}", name="edit_admin")
     * @return Response
     */
    public function editAdmins(Admins $admin, Request $request){
        $form = $this->createForm(AdminsFormType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('gestion_admins');
        }
        return $this->render('admin/admins/EditAdmins.html.twig', [
            'admin' => $admin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route ("/Admin/Admins/{id}", name="delete_admin", methods="DELETE")
     * @return Response
     */
    public function deleteAdmins(Admins $admin, Request $request){

        if ($this->isCsrfTokenValid("delete", $request->get('_token'))){
            $em = $this->getDoctrine()->getManager();
            $em->remove($admin);
            $em->flush();
        }
        
        return $this->redirectToRoute('gestion_admins');
    }

}
