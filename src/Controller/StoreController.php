<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class StoreController extends AbstractController
{
    #[Route('/store', name: 'app_store')]
    public function index()
    {
        return $this->render('store/index.html.twig');
    }
    public function cart()
    {
    return $this->render('store/cart.html.twig');
    }
}
