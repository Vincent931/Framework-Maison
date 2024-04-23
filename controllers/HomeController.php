<?php
namespace controllers;

require_once './environment.php';
require_once './autoload.php';

use views\HomeView;

class HomeController {
    
     private $view;

    //Renvoie accueil
     public function index(): void
     {
       $view = new \views\HomeView();
       echo $view->viewIndex();
     }
    //renvoie page RGPD
     public function RGPD(): void
     {
       $view = new \views\HomeView();
        echo $view->viewRGPD();
     }
    
    
    //renvoie vue a-propos.html
    public function aPropos(): void
     {
       $view = new \views\HomeView();
        echo $view->viewAPropos();
     }
    
    //renvoie la page contact
     public function windowImage(): void
     {
       $view = new \views\HomeView();
       echo $view->viewWindowImage();
     }
    
}