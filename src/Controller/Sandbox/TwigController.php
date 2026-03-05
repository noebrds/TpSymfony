<?php

namespace App\Controller\Sandbox;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/sandbox/twig', name: 'sandbox_twig')]
final class TwigController extends AbstractController
{
    #[Route('/vue1', name: '_vue1')]
    public function Vue1Action(): Response
    {
        return $this->render('Sandbox/Twig/vue1.html.twig');
    }

    #[Route('/vue2', name: '_vue2')]
    public function Vue2Action(): Response
    {
        return $this->render('Sandbox/Twig/vue2.html.twig');
    }

    #[Route('/vue3', name: '_vue3')]
    public function Vue3Action(): Response
    {
        return $this->render('Sandbox/Twig/vue3.html.twig');
    }

    #[Route('/vue4', name: '_vue4')]
    public function Vue4Action(): Response
    {
        return $this->render('Sandbox/Twig/vue4.html.twig');
    }

    public function palmaresAction(int $nb): Response
    {
        $bd_array = array();
        for ($i = 0; $i < $nb; $i++) {
            $bd_array[$i] = array(
                "productName"=> "Product".$i,
                "price" => $i,

            );
        }

        $args = ["products" => $bd_array];
        return $this->render('Sandbox/Layouts/_palmares.html.twig', $args);
    }

    #[Route('/vue5', name: '_vue5')]
    public function Vue5Action(): Response
    {
        return $this->render('Sandbox/Twig/vue5.html.twig');
    }
}
