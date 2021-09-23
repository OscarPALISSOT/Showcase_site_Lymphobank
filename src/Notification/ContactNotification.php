<?php

namespace App\Notification;

use App\Entity\Contact;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class ContactNotification {

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
            ->subject('Formulaire contact Mon cordon precieux')
            ->htmlTemplate('emails/contact.html.twig')
            ->context([
                'contact' => $contact,
            ]);

        $this->mailer->send($email);
    }
}