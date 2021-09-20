<?php

namespace App\Notification;

use App\Entity\Contact;
use Twig\Environment;

class ContactNotification {


    /* public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    } */

    public function notify(Contact $contact) {
        /* $message = (new \Swift_Message('contact mon-cordon-precieux.fr'))
            ->setFrom('noreply@mon-cordon-precieux.fr')
            ->setTo('contact@mon-cordon-precieux.fr')
            ->setReplyTo($contact->getMail())
            ->setBody($this->renderer->render('mails/contact.html.twig', [
                'contact' => $contact,
            ]), 'text/html');
        $this->mailer->send($message); */
    }
}