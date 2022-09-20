<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HeickelController extends AbstractController
{
    #[Route('/heickel', name: 'app_heickel')]
    public function index(): Response
    {
        $x = 'bonjour';
        dump($x);

        return $this->render('heickel/heickel.html.twig', [
            'name' => 'HeickelController',

        ]);
    }

    public function hello($name): Response
    {


        return $this->render('heickel/heickel.html.twig', [
            'name' => 'HeickelController',

        ]);
    }

}
