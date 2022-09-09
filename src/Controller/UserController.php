<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'user_')]
class UserController extends AbstractController

{

    #[Route('/connexion', name: 'login')]
    public function userConnexion(): Response
    {
        return $this->render('user/login.html.twig');
    }

    #[Route('/inscription', name: 'register')]
    public function userRegister(): Response
    {
        return $this->render('user/register.html.twig');
    }


}
