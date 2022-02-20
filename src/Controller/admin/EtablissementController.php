<?php

namespace App\Controller\admin;

use App\Entity\Etablissement;
use App\Form\EtablissementFormType;
use App\Repository\EtablissementRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtablissementController extends AbstractController
{
    public function __construct(EtablissementRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @Route ("/Admin/Etablissements", name="gestion_etablissements")
     * @return Response
     */
    public function ShowEtablissement(PaginatorInterface $paginator, Request $request): Response
    {

        $etablissements = $paginator->paginate(
            $this->repository->findBy(array(), array('created_at' => 'DESC')),
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('admin/etablissements/ShowEtablissements.html.twig', [
            'etablissements' => $etablissements,
            'loggedUser' => $this->getUser(),
        ]);
    }

    /**
     * @Route ("/Admin/NouveauEtablissement", name="create_etablissement")
     * @return Response
     */
    public function createEtablissement(Request $request){

        $etablissement = new Etablissement;
        $form = $this->createForm(EtablissementFormType::class, $etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $address = $form["adresse"]->getData() .',' . $form["ville"]->getData() . ',' . $form["codePostal"]->getData();

            $queryString = http_build_query([
                'access_key' => '31add3370807e163542a5d5c67d10a57',
                'query' => $address,
                'output' => 'json',
                'limit' => 1,
            ]);
            
            $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            $json = curl_exec($ch);
            
            curl_close($ch);
            
            $apiResult = json_decode($json, true);

            $etablissement->setLat($apiResult['data'][0]['latitude']);
            $etablissement->setLon($apiResult['data'][0]['longitude']);

            $em = $this->getDoctrine()->getManager();
            $em->persist($etablissement);
            $em->flush();
            return $this->redirectToRoute('gestion_etablissements');
        }
        return $this->render('admin/etablissements/CreateEtablissement.html.twig', [
            'etablissement' => $etablissement,
            'loggedUser' => $this->getUser(),
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route ("/Admin/Etablissements/{id}", name="edit_etablissement")
     * @return Response
     */
    public function editEtablissement(Etablissement $etablissement, Request $request){
        $form = $this->createForm(EtablissementFormType::class, $etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('gestion_etablissements');
        }
        return $this->render('admin/etablissements/EditEtablissement.html.twig', [
            'etablissement' => $etablissement,
            'loggedUser' => $this->getUser(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route ("/Admin/Etablissement/{id}", name="delete_etablissement", methods="DELETE")
     * @return Response
     */
    public function deleteEtablissement(Etablissement $etablissement, Request $request){

        if ($this->isCsrfTokenValid("delete", $request->get('_token'))){
            $em = $this->getDoctrine()->getManager();
            $em->remove($etablissement);
            $em->flush();
        }
        
        return $this->redirectToRoute('gestion_etablissements');
    }

}
