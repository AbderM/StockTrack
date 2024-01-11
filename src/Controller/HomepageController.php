<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(ProductRepository $productRepository): Response
    {
        $produits = $productRepository->findAll();

        return $this->render('base.html.twig', [
            'controller_name' => 'HomepageController',
            'produits' => $produits,
        ]);
    }
}
