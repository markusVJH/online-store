<?php

namespace App\Controller;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StoreController extends AbstractController
{
    #[Route('/store', name: 'app_store')]
    public function index(): Response
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://fakestoreapi.com/products?limit=10');
        if ($response->getStatusCode() == Response::HTTP_OK) {
            $products = $response->toArray();
            return $this->render('store/index-copy.html.twig', [
                'products' => $products
            ]);
        }
    }
}
