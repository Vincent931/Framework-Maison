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
    
}
