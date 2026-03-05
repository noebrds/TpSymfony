<?php

namespace App\Controller\Sandbox;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/sandbox/produit', name: 'sandbox_produit')]
final class ProduitController extends AbstractController
{
    #[Route('/list/{page}', name: 'sandbox_produit_list',
    requirements: ['page' => '[1-9]\d*'],
    defaults: ['page' => 0])]
    public function listAction(): Response
    {
        return new Response("<body></body>");
    }
}
