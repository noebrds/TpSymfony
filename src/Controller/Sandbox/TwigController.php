<?php

namespace App\Controller\Sandbox;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/sandbox/twig', name: 'sandbox_twig')]
final class TwigController extends AbstractController
{
    #[Route('/twig', name: 'app_twig')]
    public function index(): Response
    {
        return $this->render('sandbox/twig/index.html.twig', [
            'controller_name' => 'TwigController',
        ]);
    }
}
