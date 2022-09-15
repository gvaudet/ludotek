<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\GameType;
use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/jeu', name: 'game_')]

class GameController extends AbstractController
{
    public function __construct(private GameRepository $gameRepository)
    {
    }

    #[Route('', name: 'list')]
    public function list(): Response
    {
        $games = $this->gameRepository->findBy([],['name'=> 'ASC']);

        return $this->render('game/list.html.twig', [
            'games' => $games, 
        ]);
    }

// Penser à mettre le "requirements" sinon l'id sera prit en compte pour les autre chemin et on restera sur cette page.
    #[Route('/{id}', name: 'single', requirements: ["id"=> "\d+"])]
    public function single($id): Response
    {
        $singleGame = $this->gameRepository->find($id); 
        dump($singleGame);

        return $this->render('game/single.html.twig', [
            'single' => $singleGame,
        ]);
    }


    #[Route('/nouveau', name: 'form')]
    public function form(Request $request): Response
    {
        $game = new Game(); 
        $form = $this->createForm(GameType::class, $game); 

        $form->handleRequest($request); 
        if($form->isSubmitted() && $form->isValid()){
            //Sauvegarde en base de données 
            $this->gameRepository->add($game, true); 

            $this->addFlash('success', 'Bravo ton jeu à bien été enregistrer !');
            
            return $this->redirectToRoute('game_single', [
                'id' => $game->getId(),
            ]);

        }

        return $this->render('game/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}
