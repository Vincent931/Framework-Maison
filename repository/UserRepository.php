<?php
namespace repository;

require_once './environment.php';
require_once './autoload.php';

use service\AbstractRepository;
use service\MyError;
use PDO;

class UserRepository extends AbstractRepository {
    /**
     * @params string $email
     * return array $data
     */
     public function fetchUser(string $email): array|bool
     {
        $this->query = "SELECT id, name, first_name, email, password, role, DATE_FORMAT(created_at, '%d/%m/%Y \à %H:%i:%S') AS dateCr, DATE_FORMAT(updated_at, '%d/%m/%Y \à %H:%i:%S') AS dateUp FROM users WHERE email = :email";
        $data = null;
        //on verifie que le user existe venu du formulaire connectForm.html
        try {
            $query = $this->connection->prepare($this->query);
            $query->bindParam(":email" , $email);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_ASSOC);//PDO::FETCH_OBJ $data->, PDO::FETCH_ASSOC $data['']
           
        } catch (Exception $e) {
            $arrayFailed = ['message' =>$e, 'href' => './index.php?action=account', 'lien' => 'Retour', 'type' => 'sql'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
        return $data;
     }
    /**
     * @params array $user
     * @params array $arrayRolePassw
     * return PDOstatement
     */
    public function insertUser(object $user, array $arrayRolePassw): PDOstatement|bool
    {
        
        // on insert le user venu du formulaire inscript.html
        $this->query = "INSERT INTO users(name, first_name, email, password, role, created_at, updated_at) VALUES(:name, :first_name, :email, :password, :role, NOW() , NOW())";
        
        try {
            $query = $this->connection->prepare($this->query);
            if ($query) {
                // Pas normal on doit pouvoir retourner une error
                $query->bindValue(":name", $user->getName());
                $query->bindValue(":first_name", $user->getFirstName());
                $query->bindValue(":email", $user->getEmail());
                $query->bindValue(":password", $arrayRolePassw[0]);
                $query->bindValue(":role", $arrayRolePassw[1]);
                $data = $query->execute();

                return($data);
            }
        } catch (Exception $e) {
            $arrayFailed = ['message' => $e, 'href' => './index.php?action=inscription', 'lien' => 'Réessayer', 'type' => 'sql'];
            $erreur = new \service\MyError($arrayFailed);
            $erreur->manageFailed();
        }
    }
}
