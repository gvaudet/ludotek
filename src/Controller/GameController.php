<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/jeu', name: 'game_')]

class GameController extends AbstractController
{

    #[Route('', name: 'list')]
    public function list(): Response
    {
        return $this->render('game/list.html.twig');
    }

// Penser à mettre le "requirements" sinon l'id sera prit en compte pour les autre chemin et on restera sur cette page.
    #[Route('/{id}', name: 'single', requirements: ["id"=> "\d+"])]
    public function single($id): Response
    {
        return $this->render('game/single.html.twig');
    }


    #[Route('/nouveau', name: 'create')]
    public function form(): Response
    {
        return $this->render('game/form.html.twig');
    }


}
