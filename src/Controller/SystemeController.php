<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

## Gère les pages qui vont permettre de configurer l'application au niveau global (monitoring des users, des normes de sécurité, etc)
final class SystemeController extends AbstractController
{
    ## Retourne l'index de gestion de l'app, avec un module de création des normes (CyFun)
    #[Route('/systeme', name: 'app_systeme')]
    public function index(): Response
    {
        return $this->render('systeme/index.html.twig');
    }
}
