<?php session_start();
    
    require_once './environment.php';
    require_once './autoload.php';
    use controllers\HomeController;
    use controllers\UserController;
    use controllers\ProductController;
    use controllers\AdminController;
    use controllers\EmailController;
    
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
        //validation page register
        case 'receive-inscript':
            $controller = new controllers\UserController();
            $controller->inscriptInsertUser();
            break;
        //page login
        case 'connect':
            $controller = new controllers\UserController();
            $controller->connectUser();
            break;
        //validation page login
        case 'valid-form-security':
            $controller = new controllers\UserController();
            $controller->validFormConnect();
            break;
        //page produits
        case 'products':
            $controller = new controllers\ProductController();
            $controller->showProducts();
            break;
        //page erreur
        case 'error':
            $controller = new controllers\HomeController();
            $controller->showError();
            break;
        //page success
        case 'succes':
            $controller = new controllers\HomeController();
            $controller->showSuccess();
            break;
        //page compte
        case 'account':
            $controller = new controllers\UserController();
            $controller->accountUser();
            break;
        //deconnexion
        case 'deconnect':
            $controller = new controllers\UserController();
            $controller->deconnectUser();
            break;
        //page RGPD
        case 'RGPD':
            $controller = new controllers\HomeController();
            $controller->RGPD();
            break;
        //page contact
        case 'contact':
            $controller = new controllers\EmailController();
            $controller->contact();
            break;
        //envoi d'email ne fonctionne pas sur l'IDE
        case 'email':
            $controller = new controllers\EmailController();
            $controller->email();
            break;
        //la page a propos
        case 'a-propos':
            $controller = new controllers\HomeController();
            $controller->aPropos();
            break;
        //le listing des maisons et appartements
        case 'product':
            $controller = new controllers\ProductController();
            $controller->oneProduct();
            break;
        //ajout de favori en bdd
        case 'add-favori':
            $controller = new controllers\ProductController();
            $controller->addFavori();
            break;
        //page préférés
        case 'favoris':
            $controller = new ProductController();
            $controller->favoris();
            break;
        //page de confirmation delete produit
        case 'erase-favori':
            $controller = new controllers\ProductController();
            $controller->eraseFavoris();
            break;
        //la window affichant les images sous add product et update product
        case 'window-img':
            $controller = new controllers\HomeController();
            $controller->windowImage();
            break;
        /******************************* DONE admin **************************************/
        //page admin
        case 'admin':
            $controller = new controllers\AdminController();
            $controller->admin();
            break;
        //page ajout de produit
        case 'add-product':
            $controller = new controllers\AdminController();
            $controller->addProduct();
            break;
        //insertion d'un produit
        case 'validate-add-product':
            $controller = new controllers\AdminController();
            $controller->validateAddProduct();
            break;
        //page erase et update des produits
        case 'erase-update-product':
            $controller = new controllers\AdminController();
            $controller->eraseUpdateProduct();
            break;
        //page confirmation d'effacement de produit
        case 'confirm-erase-product':
            $controller = new controllers\AdminController();
            $controller->confirmEraseProduct();
            break;
        //effacement d'un produit
        case 'validate-erase-product':
           $controller = new controllers\AdminController();
           $controller->validateEraseProduct();
            break;
        //page de updating produit
        case 'show-update-product':
            $controller = new controllers\AdminController();
            $controller->showFormUpdateProduct();
            break;
        //update produit
        case 'validate-update-product':
            $controller = new controllers\AdminController();
            $controller->validateUpdateProduct();
            break;
        //add image
        case 'add-image':
            $controller = new controllers\AdminController();
            $controller->addImage();
            break;
        //validate add image
        case 'validate-add-image':
            $controller = new controllers\AdminController();
            $controller->validateAddImage();
            break;
        //listing images
        case 'erase-image':
            $controller = new controllers\AdminController();
            $controller->showImages();
            break;
        //confirmation erase image
        case 'confirm-erase-image':
            $controller = new controllers\AdminController();
            $controller->confirmEraseImage();
            break;
        //validation erase image
        case 'validate-erase-image':
           $controller = new controllers\AdminController();
           $controller->validateEraseImage();
            break;
        //defaut accueil
        default:
            $controller = new controllers\HomeController();
            $controller->index();
        break;
    }
    
    