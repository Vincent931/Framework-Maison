<?php
namespace service;

require_once './environment.php';
require_once './autoload.php';

use models\User;
use models\Template;

require_once './models/User.php';

class Utils {
    public function __construct()
    {
        $this->user = new \models\User();
        $this->template = new \models\Template();
    }
    /**
     * @params string $filename
     * @return string contents
     */
    public function searchHtml(string $filename): string
    {
        return file_get_contents('./html/'. $filename . '.html');
    }
    /**
     * @params string $filename
     * @return string contents
     */
    public function searchInc(string $filename): string
    {
        return file_get_contents('./html/inc/'. $filename . '.html');
    }
    /**
     * @params string $script
     * @return string getJs()
     */
    public function setJs(string $script): string
    {
        $this->template->addJs($script);
        return $this->template->getJs();;
    }
    /**
     * @params string $header
     * @params string $title
     * @return string $header
     */
    public function setTitle(string $header, string $title): string
    {
        return str_replace("{title}", $title, $header);
    }
    /**
     * @param string $header
     * @param string $description
     * @return string $header
     */
    public function setDescription(string $header, string $description): string
    {
        return str_replace("{description}", $description , $header);
    }
    
    /**
     * @params string $html
     * @params string $name
     * @params string $firstName
     * @params string $email
     * @params string $createdAt
     * @params string $updatedAt
     * @return string $html
     */
    public function setUserContent(string $html, string $name, string $firstName, string $email, string $createdAt, string $updatedAt, string $role): string
    { 
       
        $html = str_replace("{%name%}", $name, $html);
        $html = str_replace("{%firstName%}", $firstName, $html);
        $html = str_replace("{%email%}", $email, $html);
        $html = str_replace("{%updatedAt%}", $updatedAt, $html);
        $html = str_replace("{%role%}", $role, $html);

        return str_replace("{%createdAt%}", $createdAt, $html);
    }
    /**
     * @params string $js
     * @params string $html
     * @return string
     */
    public function replaceJs(string $js, string $html): string
    {
        return $html = str_replace("{%JS%}", $js, $html);
    }
     /**
     * @params string $html
     * return string
     */
     public function addCsrf(string $html): string
     {
        $_SESSION['csrf'] = bin2hex(random_bytes(15));
        $html = str_replace ("{%csrf%}", $_SESSION['csrf'], $html);

        return $html;
    }
}
