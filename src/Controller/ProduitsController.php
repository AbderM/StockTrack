<?php

namespace App\Controller;

use LDAP\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Form\AjoutProduitType;

class ProduitsController extends AbstractController
{
    #[Route('/produits', name: 'app_produits')]


    public function new(Request $request): Response {

        $produit = new Product();
        $form = $this->createForm(AjoutProduitType::class, $produit);
        $form->handleRequest($request); 

        return $this->render(
            'produits/index.html.twig',
            ['formProduit' => $form->createView()]
        );
    }
}
