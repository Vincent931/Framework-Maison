<?php
namespace service;

class Authenticator
{
     private $admin;
     private $user;
     
     /**
      * @params array $admin
      */
     public function setAdmin($admin): void
     {
          $this->admin = $admin;
     }
     /**
      * @return array $this->admin
      */
     public function getAdmin(): ?object
     {
          return $this->admin;
     }
     /**
      * @params array $user
      */
     public function setUser($user): void
     {
          $this->user = $user;
     }
     /**
      * @return array $this->user
      */
     public function getUser(): object | bool
     {
          return $this->user;
     }
     /**
      *@params string $user
      * return array $user
      */
     public function authAdmin(): \models\User | bool | null
     {
          $user = $this->recupereUserSession();
          
          if($user !== null && gettype($user) === "object"){
               
               if($user->getRole() === "admin"){
                    
               return $user;
               }
          } 
          
          return null;
          
     }
      /**
      *@params string $user
      * return array $user
      */
     public function authUser(): \models\User | bool | null
     {
          
         $user = $this->recupereUserSession();
          
          if($user !== null ){
               
               return $user;
          } 
          
          return null;
     }
     /**
      * @params string $user
      * return json $_SESSION["user"]
      */
     public function addUserInSession(object $user): ?string
     {
          return $_SESSION['user'] = serialize($user);
     }
     /**
      * @params json $user
      * return object $this->getUser()
      */
     public function recupereUserSession(): \models\User | bool | null
     {
          if (isset($_SESSION['user'])){
               $this->setUser(unserialize($_SESSION['user']));
               
               return $this->getUser();
          }

          return null;
     }
}