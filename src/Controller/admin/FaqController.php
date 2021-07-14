<?php

namespace App\Controller\admin;

use App\Entity\Faq;
use App\Form\FaqFormType;
use App\Repository\FaqRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FaqController extends AbstractController
{
    public function __construct(FaqRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @Route ("/Admin/Faqs", name="gestion_faqs")
     * @return Response
     */
    public function ShowFaq(PaginatorInterface $paginator, Request $request): Response
    {

        $faqs = $paginator->paginate(
            $this->repository->findBy(array(), array('ordre' => 'ASC')),
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('admin/faqs/ShowFaq.html.twig', [
            'faqs' => $faqs,
            'loggedUser' => $this->getUser(),
        ]);
    }

    /**
     * @Route ("/Admin/NouveauFaq", name="create_faq")
     * @return Response
     */
    public function createFaq(Request $request){

        $faq = new Faq;
        $form = $this->createForm(FaqFormType::class, $faq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->isNotLast($form["ordre"]->getData());
            $em = $this->getDoctrine()->getManager();
            $em->persist($faq);
            $em->flush();
            return $this->redirectToRoute('gestion_faqs');
        }
        return $this->render('admin/faqs/CreateFaq.html.twig', [
            'faq' => $faq,
            'loggedUser' => $this->getUser(),
            'form' => $form->createView(),
        ]);
    }


    /**
     * décale l'ordre des questions suivantes
     */
    public function isNotLast($ordreQuest) {
        $nextQuests = $this->repository->findBynextOdre($ordreQuest);
        if ($nextQuests){
            foreach ($nextQuests as $nextQuest) {
                $ordre = $nextQuest->getOrdre();
                $nextQuest->setOrdre($ordre+1);
            }
        }
    }


    /**
     * @Route ("/Admin/Faqs/{id}", name="edit_faq")
     * @return Response
     */
    public function editFaq(Faq $faq, Request $request){
        $form = $this->createForm(FaqFormType::class, $faq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->isNotLast($form["ordre"]->getData());
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('gestion_faqs');
        }
        return $this->render('admin/faqs/EditFaq.html.twig', [
            'faq' => $faq,
            'loggedUser' => $this->getUser(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route ("/Admin/Faq/{id}", name="delete_faq", methods="DELETE")
     * @return Response
     */
    public function deleteFaq(Faq $faq, Request $request){

        if ($this->isCsrfTokenValid("delete", $request->get('_token'))){
            $em = $this->getDoctrine()->getManager();
            $em->remove($faq);
            $em->flush();
        }
        
        return $this->redirectToRoute('gestion_faqs');
    }

}
