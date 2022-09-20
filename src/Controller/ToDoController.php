<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ToDoController extends AbstractController
{
    #[Route('/todo', name: 'app_todo')]
    public function index(SessionInterface $session): Response
    {
        /*
         * Si c'est mon premier accès
         *  Initialise le tableau de todo
         * finsi
         *
         * Affiche ma liste de todo
         */
        if (!$session->has('todos')) {
            $todos = [
                'achat'=>'acheter clé usb',
                'cours'=>'Finaliser mon cours',
                'correction'=>'corriger mes examens'
            ];
            $session->set('todos', $todos);
            $this->addFlash('info', "Bienvenu dans notre gestionnaire de Todo");
        }

        return $this->render('todo/index.html.twig');
    }
    #[Route('/todo/add/{name}/{content}', name: 'todo_add')]
    public function addTodo(SessionInterface $session, $name, $content) {
        if($session->has('todos')) {
            $todos = $session->get('todos');
            if (!isset($todos[$name])) {
                $todos[$name] = $content;
                $session->set('todos', $todos);
                $this->addFlash('success', "Le todo $name a été ajouté avec succèes");
            } else {
                $this->addFlash('error', "Le todo $name existe déjà");
            }
        } else {
            $this->addFlash('error', "La liste des todos n'existe pas");
        }
        return $this->redirectToRoute('app_todo');
    }

      #[Route('/todo/delete/{name}/{content}', name: 'todo_delete')]

       public function deletetodo(SessionInterface $session, $name, $content) {
        if($session ->has('todos')) {
            $todos = $session->unset(name: 'todos');
            $session->set('todos',$todos);
            $this->addFlash('success', "Le todo $name a été supprimé avec succèes");

        }
        else {
            $this->addFlash('danger', "Le todo $name n'existe pas");

        }
      }
    #[Route('/todo/update/{name}/{content}', name: 'todo_update')]

    public function updatetodo(SessionInterface $session, $name, $content) {
        if($session ->has('todos')) {
            $todos = $session->set(name: 'todos', value: 'content');
            $session->set('todos',$todos);
            $this->addFlash('success', "Le todo $name a été modifié avec succèes");

        }
        else {
            $this->addFlash('danger', "Le todo $name n'existe pas");

        }
    }


}