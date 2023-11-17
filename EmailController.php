<?php
namespace controllers;

require_once './environment.php';
require_once './autoload.php';

use views\EmailView;
use models\EmailContact;
use service\MyError;
use service\Success;

class EmailController{
     //renvoie la page contact
     public function contact(): void
     {
          $view = new \views\EmailView();
          echo $view->viewcontact();
     }
     //envoie un email avec PHPMailer(error 504 sur l'IDE)
     public function email(): void
     {
        $emailfrom = htmlspecialchars($_POST['email']);
        $content = htmlspecialchars($_POST['content']);
        //ce code ne fonctionne pas sur l'IDE mais en local ça fonctionne
        /*$email = new models\EmailContact($emailfrom, $content);
        $email->constructEmail();
        $valid = $email->sendEmailContact();*/
        //pour simuler une validation ok (a effacer en local)
        $valid = true;
        
        if($valid){
          $success = ['message' => 'Merci de vos observations', 'href' => "./index.php?action=accueil", 'lien' => "Aller à l'accueil maintenant"];
          $succes = new \service\Success($success);
          $succes->manageSuccess();

        } else {
               $arrayFailed = ['message' =>'Erreur Grave veuillez contacter l\'administrateur', 'href' => './index.php?action=contact', 'lien' => 'Réessayer', 'type' => 'other'];
               $erreur = new \service\MyError($arrayFailed);
               $erreur->manageFailed();
        }
     }
}    