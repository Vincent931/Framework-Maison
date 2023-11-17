<?php session_start();
    
    require_once './environment.php';
    require_once './autoload.php';
    use controllers\HomeController;
    use controllers\UserController;
    
    //route par defaut
    if(!$_GET['action']){
        header('Location: ./index.php?action=accueil');
    }
    
    switch($_GET['action']){   
        //page d'accueil
        case 'accueil':
            $controller = new controllers\HomeController();
            $controller->index();
            break;
        //page register
        case 'inscription':
            $controller = new controllers\UserController();
            $controller->inscriptForm();
            break;
        //defaut accueil
        default:
            $controller = new controllers\HomeController();
            $controller->index();
        break;
    }
    
    
