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
        $response = $client->request('GET', 'https://fakestoreapi.com/products?limit=30');
        if ($response->getStatusCode() == Response::HTTP_OK) {
            $products = $response->toArray();
        } else {
            $products = [];
        }
        return $this->render('store/index.html.twig', [
            'products' => $products,
            'page' => 'app_store'
        ]);
    }
}
