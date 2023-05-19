<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(Request $request)
    {
        $data = $request->query->get('data');
        $productIds = explode(',', $data);
        $products = $this->fetchProducts($productIds);
        return $this->render('cart/index.html.twig', ['products' => $products, 'page' => 'app_cart']);
    }
    
    private function fetchProducts($productIds)
    {
        $url = 'https://fakestoreapi.com/products';
        
        $response = file_get_contents($url);
        
        if ($response === false) {
            return [];
        }
        
        $responseData = json_decode($response, true);
        
        $filteredProducts = array_filter($responseData, function ($product) use ($productIds) {
            return in_array($product['id'], $productIds);
        });
        
        return $filteredProducts;
    }
}
