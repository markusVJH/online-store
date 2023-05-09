<?php

namespace App\Controller;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class StoreController extends AbstractController
{
    #[Route('/store', name: 'app_store')]
    public function index(): Response
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://fakestoreapi.com/products?limit=10');
        if ($response->getStatusCode() == Response::HTTP_OK) {
            $products = $response->toArray();
            return $this->render('store/index.html.twig', [
                'products' => $products
            ]);
        }
    }
    public function addToCart(Request $request, SessionInterface $session)
    {
        // Get the product ID from the POST request
        $productId = $request->request->get('productId');
        
        // Fetch the product information from the API using the product ID
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://fakestoreapi.com/products/' . $productId);
        $product = $response->toArray();
    
        // Store the product information in the session
        $session->set('cart', [
            'id' => $productId,
            'title' => $product['title'],
            'price' => $product['price'],
            // Add any other relevant product information
        ]);
    
        // Redirect to the cart page
        return $this->redirectToRoute('cart');
    }
    
}
