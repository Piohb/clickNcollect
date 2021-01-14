<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
            'banner' => true
        ]);
    }

    /**
     * @Route("/product", name="product")
     */
    public function product(): Response
    {
        return $this->render('client/product.html.twig', [
            'controller_name' => 'ClientController',
            'banner' => false
        ]);
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function cart(): Response
    {
        return $this->render('client/cart.html.twig', [
            'controller_name' => 'ClientController',
            'banner' => false
        ]);
    }
}
