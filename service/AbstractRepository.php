<?php
namespace service;
use PDO;

abstract class AbstractRepository
{
    protected $connection;
    protected $query;

    public function __construct()
    {
        define('SERVER', $_ENV['SERVER_ENV']);
        define('USER', $_ENV['USER_ENV']);
        define('PASSWORD', $_ENV['PASSWORD_ENV']);
        define('BASE', $_ENV['BASE_ENV']);
        /**
         * instanciation d'un nouvel objet PDO
         */
        try {
            $this->connection = new PDO("mysql:host=" . SERVER . ";dbname=" . BASE, USER, PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        /*
        * forcer l'encodage de PDO
        */
        $this->connection->exec("SET CHARACTER SET utf8");
    }

}
?>