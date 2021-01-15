<?php

namespace App\Controller;

use App\Repository\ShopRepository;
use App\Repository\StockRepository;
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
     * @Route("/shop/{id}", name="shop")
     */
    public function shop($id, ShopRepository $shopRepository, ProductRepository $productRepository): Response
    {
        $shop = $shopRepository->find($id);
        //$products = $productRepository->findBy()

        return $this->render('client/shop.html.twig', [
            'shop' => $shop
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
        $product = $productRepository->find($id);

        return $this->render('client/product.html.twig', [
            'product' => $product
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

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('client/contact.html.twig', [
            'controller_name' => 'ContactController',
            'home' => false,
            'banner' => true,
        ]);
    }
}
