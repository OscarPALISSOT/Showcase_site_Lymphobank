<?php

namespace App\Notification;

use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class ContactNotification {



    /* public function sendMail(Contact $contact) {
        $message = (new \Swift_Message('contact mon-cordon-precieux.fr'))
            ->setFrom('noreply@mon-cordon-precieux.fr')
            ->setTo('contact@mon-cordon-precieux.fr')
            ->setReplyTo($contact->getMail())
            ->setBody($this->renderer->render('mails/contact.html.twig', [
                'contact' => $contact,
            ]), 'text/html');
        $this->mailer->send($message);
    } */

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }
    public function sendEmail(Contact $contact)
    {
        $email = (new TemplatedEmail())
            ->from('noreply@mon-cordon-precieux.fr')
            ->to('contact@mon-cordon-precieux.fr')
            ->cc($contact->getMail())
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Formulaire contact Mon cordon precieux')
            // path of the Twig template to render
            ->htmlTemplate('emails/contact.html.twig')
            // pass variables (name => value) to the template
            ->context([
                'contact' => $contact,
            ]);

        $this->mailer->send($email);
    }
}