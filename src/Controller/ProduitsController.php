<?php

namespace App\Controller;

use LDAP\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Form\AjoutProduitType;

class ProduitsController extends AbstractController
{
    #[Route('/produits', name: 'app_produits')]


    public function new(Request $request, ManagerRegistry $doctrine): Response {

        $produit = new Product();
        $form = $this->createForm(AjoutProduitType::class, $produit);
        $form->handleRequest($request); 

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();
        } 



        return $this->render(
            'produits/index.html.twig',
            ['formProduit' => $form->createView()]
        );
    }
}
