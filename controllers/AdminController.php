<?php
namespace controllers;

require_once './environment.php';
require_once './autoload.php';

use repository\ProductRepository;
use views\HomeView;
use views\AdminView;
use service\Authenticator;
use service\MyError;
use service\Success;

class AdminController{
    //renvoie page admin
    public function admin(): void
    {
        //validation admin
        $authenticator = new \service\Authenticator();
        $admin = $authenticator->authAdmin();
        
        if($admin){//si admin ok
            $view = new \views\AdminView();
            echo $view->viewAdmin();
        } else {
            $arrayFailed = ['message' =>'Veuillez vous connecter', 'href' => './index.php?action=connect', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
    }
    //renvoie page ajout de produit (formulaire)
    public function addProduct(): void
    {
        $viewHome = new \views\HomeView();
        //validation admin
        $authenticator = new \service\Authenticator();
        $admin = $authenticator->authAdmin();
        
        if($admin){//si admin ok
            $view = new \views\AdminView();
            echo $view->viewAddProduct();
        } else {
            $arrayFailed = ['message' =>'Veuillez vous connecter', 'href' => './index.php?action=connect', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
    }
    //validation ajout de produit
    public function validateAddProduct(): void
    {
        $viewHome = new \views\HomeView();
       
        if($_POST['csrf'] !== $_SESSION['csrf']){
            $arrayFailed = ['message' =>'Erreur Grave veuillez contacter l\'administrateur', 'href' => './index.php?action=add-product', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            echo $erreur->manageFailed();
        }
         //validation admin
        $authenticator = new \service\Authenticator();
        $admin = $authenticator->authAdmin();
        
        if($admin){//si admin ok
            //validation admin
            $view = new \views\AdminView();
            $product = new \models\Product();
             //si admin ok
             $i=0;
             
            foreach($_POST as $value){
                $arrayToProduct[$i] = htmlspecialchars($value);
                $i++;
            }
            
            $product->addDataFromPost($arrayToProduct);
            $repository = new \repository\ProductRepository();
            $data = $repository->insertProduct($product);
            
            if($data){
                $success = ['message' => 'Insertion OK', 'href' => "./index.php?action=admin", 'lien' => "Retourner à l'admin"];
                $succes = new \service\Success($success);
                $succes->manageSuccess();
            } else {
                $arrayFailed = ['message' =>'Erreur Grave veuillez contacter l\'administrateur', 'href' => './index.php?action=add-product', 'lien' => 'Réessayer', 'type' => 'other'];
                $erreur = new \service\MyError($arrayFailed);
                $erreur->manageFailed();
            }
        } else {
            $arrayFailed = ['message' =>'Veuillez vous connecter', 'href' => './index.php?action=connect', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
    }
    //renvoie sur la vue erase produit
    public function eraseUpdateProduct(): void
    {
        $repository = new \repository\ProductRepository();
        $view = new \views\AdminView();
        $viewHome = new \views\HomeView();

        if(!isset($_GET['page']) || !is_numeric($_GET['page'])){
            $view->setCurrentPage(1);
            $view->setPageDown(0);
            $view->setPageUp(2);
        } else {
            
            $view->setCurrentPage($_GET['page']);
            $view->setPageDown($_GET['page']-1);
            $view->setPageUp($_GET['page']+1);
        }

         //validation admin
        $authenticator = new \service\Authenticator();
        $admin = $authenticator->authAdmin();
        
        if($admin){//si admin ok
            
            $results = $repository->fetchProd();
            echo $view->viewEraseUpdateProduct($results);
        } else {
            $arrayFailed = ['message' =>'Veuillez vous connecter', 'href' => './index.php?action=connect', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
    }
    //renvoie la vue de confirmation erase produit
    public function confirmEraseProduct(): void
    {
        $viewHome = new \views\HomeView();
        
        if($_POST['csrf'] !== $_SESSION['csrf']){
                $arrayFailed = ['message' =>'Erreur Grave veuillez contacter l\'administrateur', 'href' => './index.php?action=erase-update-product', 'lien' => 'Réessayer', 'type' => 'other'];
                $erreur = new \service\MyError($arrayFailed);
                $erreur->manageFailed();
        }
         //validation admin
        $authenticator = new \service\Authenticator();
        $admin = $authenticator->authAdmin();
        
        if($admin){//si admin ok
        
            if(isset($_POST['idToErase'])){
                $repository = new \repository\ProductRepository();
                $data = $repository->fetchOneProd(htmlspecialchars($_POST['idToErase']));
            }
            $view = new \views\AdminView();
            echo $view->viewConfirmEraseProduct($data);
        }  else {
            $arrayFailed = ['message' =>'Veuillez vous connecter', 'href' => './index.php?action=connect', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
    }
    
    //renvoie la validation d'effacement de produit
    public function validateEraseProduct(): void
    {
        $repository = new \repository\ProductRepository();
        $view = new \views\AdminView();
        $viewHome = new \views\HomeView();
        
        if($_POST['csrf'] !== $_SESSION['csrf']){
                $arrayFailed = ['message' =>'Erreur Grave veuillez contacter l\'administrateur', 'href' => './index.php?action=erase-update-product', 'lien' => 'Réessayer', 'type' => 'other'];
                $erreur = new \service\MyError($arrayFailed);
                echo $erreur->manageFailed();
        }
         //validation admin
        $authenticator = new \service\Authenticator();
        $admin = $authenticator->authAdmin();
        
        if($admin){//si admin ok
            
            $results = $repository->deleteProd(htmlspecialchars($_POST['idToErase']));
            
            if(!$results){
                $arrayFailed = ['message' =>'Erreur Grave, veuillez contacter l\'administrateur', 'href' => './index.php?action=erase-update-product', 'lien' => 'Retour', 'type' => 'other'];
                $erreur = new service\MyError($arrayFailed);
                echo $erreur->manageFailed();
            } else {
                
                $success = ['message' => 'Opération OK', 'href' => "./index.php?action=admin", 'lien' => "Retourner à l'admin"];
                $succes = new \service\Success($success);
                $succes->manageSuccess();
            }
        } else {
            $arrayFailed = ['message' =>'Veuillez vous connecter', 'href' => './index.php?action=connect', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
    }
    
    public function showFormUpdateProduct(): void
    {
        $repository = new \repository\ProductRepository();
        $view = new \views\AdminView();
        $viewHome = new \views\HomeView();
        
        if($_POST['csrf'] !== $_SESSION['csrf']){
            $arrayFailed = ['message' =>'Erreur Grave veuillez contacter l\'administrateur', 'href' => './index.php?action=erase-update-product', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
        
         //validation admin
        $authenticator = new \service\Authenticator();
        $admin = $authenticator->authAdmin();
        
        if($admin){//si admin ok
            if(isset($_POST['idToUpdate'])){
            $data = $repository->fetchOneProd(htmlspecialchars($_POST['idToUpdate']));
            }
        echo $view->viewUpdateProduct($data);
        } else {
            $arrayFailed = ['message' =>'Veuillez vous connecter', 'href' => './index.php?action=connect', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
    }
    
    public function validateUpdateProduct(): void
    {
        $repository = new \repository\ProductRepository();
        $product = new \models\Product();
        $viewHome = new \views\HomeView();
        
        if($_POST['csrf'] !== $_SESSION['csrf']){
            $arrayFailed = ['message' =>'Erreur Grave veuillez contacter l\'administrateur', 'href' => './index.php?action=erase-update-product', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
        $i = 0;
        $authenticator = new \service\Authenticator();
        $admin = $authenticator->authAdmin();
        
        if($admin){//si admin ok
        
        foreach($_POST as $value){
                $arrayToProduct[$i] = htmlspecialchars($value);
                $i++;
            }
            $product->addDataFromPost($arrayToProduct);
            $data = $repository->updateOneProd(htmlspecialchars($_POST['idToUpdate']), $product);
            
            if($data){
            
                $success = ['message' => 'Update OK', 'href' => "./index.php?action=admin", 'lien' => "Retourner à l'admin"];
                $succes = new \service\Success($success);
                $succes->manageSuccess();
            } else {
                $arrayFailed = ['message' =>'Erreur', 'href' => './index.php?action=erase-update-product', 'lien' => 'Réessayer', 'type' => 'other'];
                $erreur = new \service\MyError($arrayFailed);
                $erreur->manageFailed();

            }
        } else {
            $arrayFailed = ['message' =>'Veuillez vous connecter', 'href' => './index.php?action=connect', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
    }
    
    //add image
    public function addImage(): void
    {
        //validation admin
        $authenticator = new \service\Authenticator();
        $admin = $authenticator->authAdmin();
        
        if($admin){//si admin ok
            $view = new \views\AdminView();
            echo $view->viewAddImage();
        } else {
            $arrayFailed = ['message' =>'Veuillez vous connecter', 'href' => './index.php?action=connect', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
    }
    //add image
    public function validateAddImage(): void
    {
        if($_POST['csrf'] !== $_SESSION['csrf']){
                $arrayFailed = ['message' =>'Erreur Grave veuillez contacter l\'administrateur', 'href' => './index.php?action=erase-update-product', 'lien' => 'Réessayer', 'type' => 'other'];
                $erreur = new \service\MyError($arrayFailed);
                echo $erreur->manageFailed();
        }
        //validation admin
        $authenticator = new \service\Authenticator();
        $admin = $authenticator->authAdmin();
        
        if($admin){
            //si admin ok
            
            $nameF = htmlspecialchars($_POST['nameF']);
            $description = htmlspecialchars($_POST['description']);
            $extension_valide = array('jpg', 'jpeg', 'png', 'gif');
            $extension_upload=strtolower( substr(strrchr($_FILES['image']['name'], '.') ,1) );
            
            if (in_array($extension_upload, $extension_valide)){
                
                $fichier = $nameF.'.'.$extension_upload;
                $repository = new \repository\ProductRepository();
                $image = $repository->fetchImageByName($fichier);
                
                if(isset($image) AND !empty($image)){
                    $arrayFailed = ['message' =>'Image déjà existante', 'href' => './index.php?action=admin', 'lien' => 'Réessayer', 'type' => 'other'];
                    $erreur = new \service\MyError($arrayFailed);
                    $erreur->manageFailed();
                } else {
                    $nom="./public/img/{$nameF}.{$extension_upload}";
    				$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom);
    				
    				if($resultat){
    				    
    				    $insertionOK = $repository->insertImage($fichier, $description);
    				    
    				    if($insertionOK){
    				        
    				        $success = ['message' => 'Insertion OK', 'href' => "./index.php?action=admin", 'lien' => "Retourner à l'admin"];
                            $succes = new \service\Success($success);
                            $succes->manageSuccess();
    				    }
    				} else {
                        $arrayFailed = ['message' =>'Quelque chose s\'est mal passé lors de l\'enregistrement dans le dossier image', 'href' => './index.php?action=add-image', 'lien' => 'Réessayer', 'type' => 'other'];
                        $erreur = new \service\MyError($arrayFailed);
                        $erreur->manageFailed();
                    }
                    
                }
            
               
            } else {
                $arrayFailed = ['message' =>'Mauvaise extension', 'href' => './index.php?action=add-image', 'lien' => 'Réessayer', 'type' => 'other'];
                $erreur = new \service\MyError($arrayFailed);
                $erreur->manageFailed();
            }
        } else {
            $arrayFailed = ['message' =>'Veuillez vous connecter', 'href' => './index.php?action=connect', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
    }
    //listing erase images
    public function showImages(): void
    {
        //validation admin
        $authenticator = new \service\Authenticator();
        $admin = $authenticator->authAdmin();
        
        if($admin){
            //si admin ok
            $repository = new \repository\ProductRepository();
            $data = $repository->fetchAllImages();
            
            $view = new \views\AdminView();
            echo $view->viewEraseProduct($data);
            
        } else {
            $arrayFailed = ['message' =>'Veuillez vous connecter', 'href' => './index.php?action=connect', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
    }
    public function confirmEraseImage(): void
    {
        if($_POST['csrf'] !== $_SESSION['csrf']){
                $arrayFailed = ['message' =>'Erreur Grave veuillez contacter l\'administrateur', 'href' => './index.php?action=erase-update-product', 'lien' => 'Réessayer', 'type' => 'other'];
                $erreur = new \service\MyError($arrayFailed);
                echo $erreur->manageFailed();
        }
        //validation admin
        $authenticator = new \service\Authenticator();
        $admin = $authenticator->authAdmin();
        
        if($admin){
            //si admin ok
            $nameToErase = htmlspecialchars($_POST['nameToErase']);
            $repository = new \repository\ProductRepository();
            $data = $repository->fetchImageByName($nameToErase);
            
            $view = new \views\AdminView();
            echo $view->viewConfirmEraseImage($data);
        } else {
            $arrayFailed = ['message' =>'Veuillez vous connecter', 'href' => './index.php?action=connect', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
    }
    //validation effacement images
    public function validateEraseImage(): void
    {
        if($_POST['csrf'] !== $_SESSION['csrf']){
                $arrayFailed = ['message' =>'Erreur Grave veuillez contacter l\'administrateur', 'href' => './index.php?action=erase-update-product', 'lien' => 'Réessayer', 'type' => 'other'];
                $erreur = new \service\MyError($arrayFailed);
                echo $erreur->manageFailed();
        }
        //validation admin
        $authenticator = new \service\Authenticator();
        $admin = $authenticator->authAdmin();
        
        if($admin){
            $nameToErase = htmlspecialchars($_POST['nameToErase']);
            //si admin ok
            $image='./public/img/'.$nameToErase;
            $effacement = unlink($image);
            
            if($effacement){
                
                $repository = new \repository\ProductRepository();
                $data = $repository->eraseImage($nameToErase);
                
                $success = ['message' => 'Effacement OK', 'href' => "./index.php?action=erase-image", 'lien' => "Retourner aux images"];
                $succes = new \service\Success($success);
                $succes->manageSuccess();
                
            } else {
                $arrayFailed = ['message' =>'Quelquechose s\'est mal passé', 'href' => './index.php?action=connect', 'lien' => 'Réessayer', 'type' => 'other'];
                $erreur = new \service\MyError($arrayFailed);
                $erreur->manageFailed();
            }
            
        } else {
            $arrayFailed = ['message' =>'Veuillez vous connecter', 'href' => './index.php?action=connect', 'lien' => 'Réessayer', 'type' => 'other'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
    }
}