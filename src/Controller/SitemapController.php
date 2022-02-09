<?php

namespace App\Controller;

use App\Entity\Actu;
use App\Repository\ActuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class SitemapController extends AbstractController
{

    public function __construct(Environment $twig, ActuRepository $actuRepository)
    {
        $this->twig = $twig;
        $this->actuRepository = $actuRepository;
    }


    /**
     * @Route("/sitemap.xml", name="sitemap", defaults={"_format"="xml"})
     */
    public function index(Request $request): Response
    {

        // Nous récupérons le nom d'hôte depuis l'URL
        $hostname = $request->getSchemeAndHttpHost();

        // On initialise un tableau pour lister les URLs
        $urls = [];

        $urls[] = ['loc' => $this->generateUrl('home')];
        $urls[] = ['loc' => $this->generateUrl('cestquoi')];
        $urls[] = ['loc' => $this->generateUrl('pourquoi')];
        $urls[] = ['loc' => $this->generateUrl('comment')];
        $urls[] = ['loc' => $this->generateUrl('ou')];
        $urls[] = ['loc' => $this->generateUrl('faq')];
        $urls[] = ['loc' => $this->generateUrl('about')];
        $urls[] = ['loc' => $this->generateUrl('mentions')];
        $urls[] = ['loc' => $this->generateUrl('contact')];

        $actus = $this->actuRepository->findAll();
        foreach ( $actus as $actu) {
            $urls[] = [
                'loc' => $this->generateUrl('this_actu', [
                    'id' => $actu->getId(),
                ]),
                'lastmod' => $actu->getUpdatedAt()->format('Y-m-d'),
            ];
        }

        $response = new Response(
            $this->renderView('sitemap.html.twig', ['urls' => $urls,
                'hostname' => $hostname]),
            200
        );

        // Ajout des entêtes
        $response->headers->set('Content-Type', 'text/xml');

        // On envoie la réponse
        return $response;
    }
}