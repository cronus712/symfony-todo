<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CvController extends AbstractController
{


    #[Route('/cv/{name}/{last}/{age}/{section}', name: 'monCv')]
    public function index($name, $last, $age, $section): Response
    {



        return $this->render('cv/index.html.twig', [
            'controller_name' => 'CvController',
            'name' => $name,
            'last' => $last,
            'age' => $age,
            'section' => $section


        ]);
    }
}
