<?php
namespace service;

require_once './environment.php';
require_once './autoload.php';

use views\Homeview;
use service\Authenticator;

class Success{
     
     private array $success;
      
     public function __construct(array $success){
          $this->success = ['message' => $success['message'], 'href' => $success['href'], 'lien' => $success['lien']];
     }
     /**
      * return array $this->success
      */
     public function getSuccess(): array
     {
          return $this->success;
     }
     /**
      * @params array $success
      */
     public function setSuccess(array $success): void
     {
          $this->success = $success;
     }
     public function manageSuccess(): void
     {
          $view = new \views\HomeView();
          echo $view->showSuccess($this->getSuccess());
     }
}