<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;

class ClientController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ProductRepository $productRepository): Response
    {

        $products = $productRepository->findAll();

        return $this->render('client/index.html.twig', [
            'products' => $products
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
     * @Route("/product/{id}", name="product")
     */
    public function product($id, ProductRepository $productRepository): Response
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
