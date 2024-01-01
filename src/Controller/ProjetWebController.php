<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetWebController extends AbstractController
{
    #[Route('/projet/web', name: 'app_projet_web')]
    public function index(): Response
    {
        return $this->render('projet_web/index.html.twig', [
            'controller_name' => 'ProjetWebController',
        ]);
    }
}
