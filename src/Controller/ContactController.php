<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use App\Notification\ContactNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ContactController extends AbstractController
{


    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }



    /**
     * @Route ("/nousContacter", name="contact")
     * @return Response
     */
    public function index(Request $request, ContactNotification $Notification) : Response{

        $Contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $Contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            /* $Notification->notify($Contact);
            $this->addFlash('succes', 'Votre message a bien été envoyé.'); */
            return $this->redirectToRoute('contact');
        }
        return $this->render('pages/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
?>