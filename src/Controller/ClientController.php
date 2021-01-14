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
            'controller_name' => 'IndexController',
            'home' => true,
            'banner' => false
        ]);
    }

    /**
     * @Route("/shop", name="shop")
     */
    public function shop(): Response
    {
        return $this->render('client/shop.html.twig', [
            'controller_name' => 'ShopController',
            'home' => false,
            'banner' => true,
            'h2' => 'Shop'
        ]);
    }

    /**
     * @Route("/product-search", name="product-search")
     */
    public function productSearch(): Response
    {
        return $this->render('client/product-search.html.twig', [
            'controller_name' => 'ProductSearchController',
            'home' => false,
            'banner' => true,
            'h2' => 'Product Search'
        ]);
    }

    /**
     * @Route("/product", name="product")
     */
    public function product(): Response
    {
        return $this->render('client/product.html.twig', [
            'controller_name' => 'ProductController',
            'home' => false,
            'banner' => true,
            'h2' => 'Product'
        ]);
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function cart(): Response
    {
        return $this->render('client/cart.html.twig', [
            'controller_name' => 'CartController',
            'home' => false,
            'banner' => true,
            'h2' => 'Shopping Cart'
        ]);
    }
}
