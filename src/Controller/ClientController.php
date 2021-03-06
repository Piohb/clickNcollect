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
<<<<<<< HEAD
    public function shop($id, ShopRepository $shopRepository, StockRepository $stockRepository, ProductRepository $productRepository): Response
=======
    public function shop($id, ShopRepository $shopRepository, StockRepository $stockRepository): Response
>>>>>>> 6b24d94675d899982de96e803e554f3605222cd1
    {
        $shop = $shopRepository->find($id);
        $stocks = $stockRepository->findBy(
          ['shop' => $id]
        );

        //dump($stocks);
        return $this->render('client/shop.html.twig', [
            'shop' => $shop,
            'stocks' => $stocks
        ]);
    }

    /**
     * @Route("/product-search", name="product-search")
     */
    public function productSearch(): Response
    {
        return $this->render('client/product-search.html.twig');
    }

    /**
     * @Route("/product/{id}", name="product")
     */
    public function product($id, ProductRepository $productRepository, StockRepository $stockRepository): Response
    {
        $product = $productRepository->find($id);
        $stock = $stockRepository->findOneBy(
            ['product' => $id]
        );

<<<<<<< HEAD
        $stock = $stockRepository->findOneBy(
          ['product' => $id]
        );
 dump($stock, $product);
=======
        //dump($stock);
>>>>>>> 6b24d94675d899982de96e803e554f3605222cd1
        return $this->render('client/product.html.twig', [
            'product' => $product,
            'stock' => $stock
        ]);
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function cart(): Response
    {
        return $this->render('client/cart.html.twig');
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
