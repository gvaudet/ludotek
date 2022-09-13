<?php

namespace App\Controller; 

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('', name: 'main_')]

class MainController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }



    #[Route('/a-propos', name: 'about')]
    public function about(): Response
    {
        return $this->render('main/about.html.twig');
    }

}



/**
 * 
 * Créer la route permettant d'accéder à la fiche des jeux référencés sur la plateforme => V 
 * Créer la route permettant d'accéder à la fiche d'un jeu => V
 * Créer la route de création d'un jeu 
 * Créer la route permettant d'accéder à la page de connexion et la page inscription => V
 * Créer la route vers une page  propos => V
 */
