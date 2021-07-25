<?php

namespace App\Controller\admin;

use App\Entity\Temoignage;
use App\Form\TemoignageFormType;
use App\Repository\TemoignageRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemoignageController extends AbstractController
{
    public function __construct(TemoignageRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @Route ("/Admin/Temoignages", name="gestion_temoignages")
     * @return Response
     */
    public function ShowTemoignage(PaginatorInterface $paginator, Request $request): Response
    {

        $temoignages = $paginator->paginate(
            $this->repository->findBy(array(), array('ordre' => 'ASC')),
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('admin/temoignages/ShowTemoignage.html.twig', [
            'temoignages' => $temoignages,
            'loggedUser' => $this->getUser(),
        ]);
    }

    /**
     * @Route ("/Admin/NouveauTemoignage", name="create_temoignage")
     * @return Response
     */
    public function createTemoignage(Request $request){

        $temoignage = new Temoignage;
        $form = $this->createForm(TemoignageFormType::class, $temoignage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->isNotLastAdd($form["ordre"]->getData());
            $em = $this->getDoctrine()->getManager();
            $em->persist($temoignage);
            $em->flush();
            return $this->redirectToRoute('gestion_temoignages');
        }
        return $this->render('admin/temoignages/CreateTemoignage.html.twig', [
            'temoignage' => $temoignage,
            'loggedUser' => $this->getUser(),
            'form' => $form->createView(),
        ]);
    }



    /**
     * décale l'ordre des questions suivantes de +1
     */
    public function isNotLastAdd($ordreQuest) {
        $nextQuests = $this->repository->findBynextOdre($ordreQuest);
        if ($nextQuests){
            foreach ($nextQuests as $nextQuest) {
                $ordre = $nextQuest->getOrdre();
                $nextQuest->setOrdre($ordre+1);
            }
        }
    }

    /**
     * décale l'ordre des questions suivantes de -1
     */
    public function isNotLastSub($ordreQuest) {
        $nextQuests = $this->repository->findBynextOdre($ordreQuest);
        if ($nextQuests){
            foreach ($nextQuests as $nextQuest) {
                $ordre = $nextQuest->getOrdre();
                $nextQuest->setOrdre($ordre-1);
            }
        }
    }

    /**
     * décale l'ordre des questions jusqu'au nouvel emplacement
     */
    public function isNotLastEdit($currentOrdre, $newOrdre) {
        $Quests = $this->repository->findByBetweenOdre($currentOrdre, $newOrdre);
        if (($currentOrdre - $newOrdre) < 0) {
            foreach ($Quests as $Quest) {
                $ordre = $Quest->getOrdre();
                $Quest->setOrdre($ordre-1);
            }
        } else if (($currentOrdre - $newOrdre) > 0) {
            foreach ($Quests as $Quest) {
                $ordre = $Quest->getOrdre();
                $Quest->setOrdre($ordre+1);
            }
        }
    }

    /**
     * @Route ("/Admin/Temoignages/{id}", name="edit_temoignage")
     * @return Response
     */
    public function editTemoignage(Temoignage $temoignage, Request $request){
        $form = $this->createForm(TemoignageFormType::class, $temoignage);
        $form->handleRequest($request);
        $currentOrdre = (int)$request->get('ordre');
        if ($form->isSubmitted() && $form->isValid()){
            $newOrdre = $form["ordre"]->getData();
            $this->isNotLastEdit($currentOrdre, $newOrdre);
            $temoignage->setOrdre($newOrdre);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('gestion_temoignages');
        }
        return $this->render('admin/temoignages/EditTemoignage.html.twig', [
            'temoignage' => $temoignage,
            'loggedUser' => $this->getUser(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route ("/Admin/Temoignage/{id}", name="delete_temoignage", methods="DELETE")
     * @return Response
     */
    public function deleteTemoignage(Temoignage $temoignage, Request $request){

        if ($this->isCsrfTokenValid("delete", $request->get('_token'))){
            $this->isNotLastSub($temoignage->getOrdre());
            $em = $this->getDoctrine()->getManager();
            $em->remove($temoignage);
            $em->flush();
        }
        
        return $this->redirectToRoute('gestion_temoignages');
    }

}
