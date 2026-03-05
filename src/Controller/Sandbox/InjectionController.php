<?php

namespace App\Controller\Sandbox;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/sandbox/injection', name: 'sandbox_injection')]
final class InjectionController extends AbstractController
{
    #[Route('/un ', name: '_un')]
    public function unAction(Request $request): Response
    {
        dump($request->getMethod());
        dump($request->query->get('foo'));
        dump($request->query->all());
        dump($request->cookies->all());
        return new Response("<body>Injection::un</body>");
    }

    #[Route('/deux ', name: '_deux')]
    public function deuxAction(Request $request, Session $session): Response
    {
        if($request->query->has('compteur')){
            $session->set('compteur', $request->query->get('compteur'));
        }elseif($request->query->has('inc')){
            $session->set('compteur', $session->get('compteur') + 1);
        }elseif($request->query->get('supp') !== null) {
            $session->remove('compteur');
        }

        dump($session->all());
        dump($_SESSION);
        
        return new Response("<body>Injection::deux</body>");
    }


    #[Route('/create-flash', name: '_create_flash')]
    public function createFlashAction(Session $session): Response{
        $session->getFlashBag()->add('info', 'L\'enregistrement a été supprimé');
        $this->addFlash('info', 'L\'enregistrement a été supprimé (bis)');
        $this->addFlash('error', 'C\'est une erreur');
        $this->addFlash('error', 'C\'est une autre erreur');
        return $this->redirectToRoute("sandbox_injection_display_flash");
    }

    #[Route('/display-flash', name: '_display_flash')]
    public function displayFlashAction(Session $session): Response{
        return $this->render('Sandbox/Injection/displayFlash.html.twig', []);
    }
}
