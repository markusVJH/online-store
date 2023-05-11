<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index()
    {
      $cart_items = $this->getCartItems();
      return $this->render('cart/index.html.twig', [
        'cart_items' => $cart_items,
    ]);
    }    
}
