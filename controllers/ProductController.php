<?php
namespace controllers;

require_once './environment.php';
require_once './autoload.php';

use repository\ProductRepository;
use views\HomeView;
use views\ProductView;
use models\Product;
use service\Authenticator;
use service\MyError;
use service\Success;

class ProductController {
    
    const MAX_FAVORIS = 15;
    
    public function __construct()
    {
        $this->utils = new \service\Utils();
    }
   //renvoie page listing produit  
    public function showProducts(): void
    {
        $view = new \views\ProductView();
        $roomslimit = "T1";
        
        if(!isset($_GET['page']) || !is_numeric($_GET['page'])){
            $view->setCurrentPage(1);
            $view->setPageDown(0);
            $view->setPageUp(2);
            if(isset($_POST['rooms'])){
                $roomslimit = $_POST['rooms'];
                $view->setCurrentPage(1);
                $view->setPageDown(0);
                $view->setPageUp(2);
                $view->setRoom($roomslimit);
            }
        } else if(isset($_GET['page']) && isset($_GET['room'])){
            $view->setCurrentPage($_GET['page']);
            $view->setPageDown($_GET['page']-1);
            $view->setPageUp($_GET['page']+1);
            $roomslimit = $_GET['room'];
            $view->setRoom($roomslimit);
            //var_dump($_GET['page'],$_GET['room']); die();
        } else {
            
            $view->setCurrentPage(1);
            $view->setPageDown(0);
            $view->setPageUp(2);
            $view->setRoom('T1');
        }
        
         
        $repository = new \repository\ProductRepository();
        $results = $repository->fetchProd();
        $counter = count($results);
        echo $view->viewProducts($results, $roomslimit, $counter);
    }

    public function oneProduct(): void
    {
        $view = new \views\ProductView();
        $viewHome = new \views\HomeView();
        
        if(isset($_GET['secureid']) && is_numeric($_GET['secureid'])){
            $id = htmlspecialchars($_GET['secureid']);
        } else {
            $arrayFailed = ['message' =>'Erreur Grave veuillez contacter l\'administrateur', 'href' => './index.php?action=products', 'lien' => 'Retour', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
        
        if(isset($_SERVER['HTTP_REFERER'])){ 
            $url = $_SERVER['HTTP_REFERER'];
        } else {
            $url ="";
        }
        $repository = new \repository\ProductRepository();
        $results = $repository->fetchOneProd($id);
        
        if(gettype($results) === "boolean"){
            
            $arrayFailed = ['message' =>'Erreur Grave, Quelquechose s\'est mal passée', 'href' => './index.php?action=products', 'lien' => 'Retour', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
            
        } else{
            
            echo $view->viewOneProduct($results, $url);
        }
    }
    
    public function addFavori(): void
    {
        //s'execute coté
        $valid = "";
        $repository = new \repository\ProductRepository();
        
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $idProd = htmlspecialchars($_GET['id']);
            //si user est connecté
            $authenticator = new \service\Authenticator();
            $user = $authenticator->authUser();
            $userId = $authenticator->getUser()->getId();
            $number = $repository->countFavoris($userId);
            $number = $number['COUNT( * )'];
            
            if ($number <= self::MAX_FAVORIS){
                $existFavori = $repository->fetchIfExistFavori($idProd, $userId);
    
                if(!$existFavori){
                $valid = $repository->addFavoriInBase($idProd, $userId);
                }
            }
            echo json_encode($valid);
        }
    }

   public function favoris(): void
   {
        $repository = new \repository\ProductRepository();
        $view = new \views\ProductView();
        //si user est connecté
        $authenticator = new \service\Authenticator();
        $user = $authenticator->authUser();
        
        if($user !== null){
        
            $email = $user->getEmail();
            $data = $repository->fetchFavoris($email);
            
            if(isset($_SERVER['HTTP_REFERER'])){
                
                $url = $_SERVER['HTTP_REFERER'];
            } else{
                
                $url ="";
            }
            //si $data venant du repo n'est pas un array quelquechose s'est mal passé ! on rentre dans le else
            
            if(gettype($data) === "array"){
                
                echo $view->showFavoris($data, $url);
                
            } else {
                
                header('Location: ./index.php?action=connect');
            }
        
        } else {
            
            header('Location: ./index.php?action=connect');
        }
    }
    
    public function eraseFavoris(): void
    {
        if($_POST['csrf'] !== $_SESSION['csrf']){
                $arrayFailed = ['message' =>'Erreur Grave veuillez contacter l\'administrateur', 'href' => './index.php?action=favoris', 'lien' => 'Réessayer', 'type' => 'other'];
                $erreur = new \service\MyError($arrayFailed);
                echo $erreur->manageFailed();
        }
        
        $repository = new \repository\ProductRepository();
        $idFavori = htmlspecialchars($_POST['id']);
        //si user est connecté
        $authenticator = new \service\Authenticator();
        $user = $authenticator->authUser();
        $data = $repository->eraseOneFavoris($idFavori);
        
        if(!$data){
            $arrayFailed = ['message' =>'Erreur', 'href' => './index.php?action=favoris', 'lien' => 'Retour', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        } else {
                $success =['message' => "OK", 'href' => "./index.php?action=favoris", 'lien' => "Retour"];
                $succes = new \service\Success($success);
                $succes->manageSuccess();
        }
    }
}
