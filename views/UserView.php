<?php
namespace views;

require_once './environment.php';
require_once './autoload.php';

use service\Utils;
use models\User;
use models\Template;

class UserView {
    public function __construct()
    {
        $this->utils = new \service\Utils();
        $this->user = new \models\User();
    }
    //renvoie connectForm.html
    /**
     * @params $message string
     * return string $page
     */
    public function connectForm(string $message): string
    {
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header');
        $header = $this->utils->setTitle($header, "Vous connecter pour obtenir le meilleur de Super agence");
        $header = $this->utils->setDescription($header, "La page de connexion de Super Agence");
        $bodyUp = $this->utils->searchInc('body-up');
        $body = $this->utils->searchHtml('connectForm');
        $body = $this->utils->addCsrf($body);
        $bodyBottom = $this->utils->searchInc('body-bottom');
        $footer = $this->utils->searchInc('footer');
        $this->utils->setJs('<script type="module" src="./public/js/app.other.js"></script>');
        $js = $this->utils->setJs('<script src="https://kit.fontawesome.com/80f9a27b0d.js" crossorigin="anonymous"></script>');
        $footer = $this->utils->replaceJs($js, $footer);
        $footer = $this->utils->setLinkedInJsInFooter($footer);
        $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
        $page = $temp->getTemplate();
        $page = str_replace("{message}", $message, $page);
        
        return $page;
    }
    //renvoie inscript.html
    /**
     * return string $page
     */
    public function inscriptForm(): string
    {
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header');
        $header = $this->utils->setTitle($header, "Vous inscrire pour obtenir le meilleur de Super Agence");
        $header = $this->utils->setDescription($header, "La page d'inscription de Super Agence");
        $bodyUp = $this->utils->searchInc('body-up');
        $body = $this->utils->searchHtml('inscript');
        $body = $this->utils->addCsrf($body);
        $bodyBottom = $this->utils->searchInc('body-bottom');
        $footer = $this->utils->searchInc('footer');
        $this->utils->setJs('<script type="module" src="./public/js/app.other.js"></script>');
        $js = $this->utils->setJs('<script src="https://kit.fontawesome.com/80f9a27b0d.js" crossorigin="anonymous"></script>');
        $footer = $this->utils->replaceJs($js, $footer);
        $footer = $this->utils->setLinkedInJsInFooter($footer);
        $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
        $page = $temp->getTemplate();
        
        return $page;
    }
    //renvoie la page compte
    /**
     * @params object $user
     * return string $page
     */
    public function displayAccount($user): string
     {
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header');
        $header = $this->utils->setTitle($header, "Votre compte");
        $header = $this->utils->setDescription($header, "La page de compte de Super Agence");
        $bodyUp = $this->utils->searchInc('body-up');
        $body = $this->utils->searchHtml('account');
        $body = $this->utils->setUserContent($body, $user->getName(), $user->getFirstName(), $user->getEmail(), $user->getCreatedAt(), $user->getUpdatedAt(), $user->getRole());
        $bodyBottom = $this->utils->searchInc('body-bottom');
        $footer = $this->utils->searchInc('footer');
        $this->utils->setJs('<script type="module" src="./public/js/app.other.js"></script>');
        $js = $this->utils->setJs('<script src="https://kit.fontawesome.com/80f9a27b0d.js" crossorigin="anonymous"></script>');
        $footer = $this->utils->replaceJs($js, $footer);
        $footer = $this->utils->setLinkedInJsInFooter($footer);
        $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
        $page = $temp->getTemplate();
        
        return $page;
    }
}