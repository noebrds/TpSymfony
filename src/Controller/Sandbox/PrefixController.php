<?php

namespace App\Controller\Sandbox;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/sandbox/prefix', name: 'sandbox_prefix')]
final class PrefixController extends AbstractController
{
    #[Route('', name: '')]
    public function indexAction(): Response
    {
        return new Response("<body>Hello world!</body>");
    }

    #[Route('/hello2', name: '_hello2')]
    public function hello2Action(): Response
    {
        return $this->render('Sandbox/Prefix/hello2.html.twig');
    }

    #[Route('/hello3', name: '_hello3')]
    public function hello3Action(): Response
    {
        $args = array(
            'prenom' => 'Gilles',
            'jeux' => ['A Plage Tale: Innocence', 'Wow', 'Mass Effect', 'Life is Strange']
        );
        return $this->render('Sandbox/Prefix/hello3.html.twig', $args);
    }

    #[Route('/hello4', name: 's_hello4')]
    public function hello4Action(): Response
    {
        $args = array(
            'prenom' => 'Gilles',
            'jeux' => ['A Plage Tale: Innocence', 'Wow', 'Mass Effect', 'Life is Strange']
        );
        return $this->render('Sandbox/Prefix/hello4.html.twig', $args);
    }
}
