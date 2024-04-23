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
     * params string $footer
     * return string $footer
     */
    public function setLinkedInJsInFooter($footer): string
    {
         return str_replace("{%linkedin%}", $this->template->getLinkedInJs(), $footer);
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
     * @params int $pageDown
     * @params int $currentPage
     * @params int $pageUp
     * @params string roomslimit
     * @return string $html
     */
    public function setLink(string $html, int $pageDown, int $currentPage, int $pageUp, string $roomslimit): string
    {
        $html = str_replace("{%pageDown%}", $pageDown , $html);
        $html = str_replace("{%currentPage%}", $currentPage , $html);
        $html = str_replace("{%pageUp%}", $pageUp , $html);

        return str_replace("{%roomsLimit%}", $roomslimit , $html);
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
         if($role === "admin"){
         $role = $role."&nbsp;&nbsp;&nbsp;&nbsp;<a class=\"a-prod-index\" href=\"./index.php?action=admin\">Aller à l'Admin</a>";
          }
       
        $html = str_replace("{%name%}", $name, $html);
        $html = str_replace("{%firstName%}", $firstName, $html);
        $html = str_replace("{%email%}", $email, $html);
        $html = str_replace("{%updatedAt%}", $updatedAt, $html);
        $html = str_replace("{%role%}", $role, $html);

        return str_replace("{%createdAt%}", $createdAt, $html);
    }
     /**
     * @params string $html
     * @params string $limit
     * @return string $html
     */
    public function replaceLimit(string $html, string $limit): string
    {
        switch($limit){
          case 'T1':
               $arr = ['checked', '', '', '', '', '', ''];
               break;
          case 'T1 bis':
               $arr = ['', 'checked', '', '', '', '', ''];
               break;
          case 'T2':
               $arr = ['', '', 'checked', '', '', '', ''];
               break;
          case 'T3':
               $arr = ['', '', '', 'checked', '', '', ''];
               break;
          case 'T4':
                $arr = ['', '', '', '', 'checked', '', ''];
               break;
          case 'T5':
                $arr = ['', '', '', '', '', 'checked', ''];
               break;
          case 'T55':
               $arr = ['', '', '', '', '', '', 'checked'];
               break;
          default:
               $arr = ['checked', '', '', '', '', '', ''];
               break;
        }
        $html = str_replace("{%checked1%}", $arr[0], $html);
        $html = str_replace("{%checked2%}", $arr[1], $html);
        $html = str_replace("{%checked3%}", $arr[2], $html);
        $html = str_replace("{%checked4%}", $arr[3], $html);
        $html = str_replace("{%checked5%}", $arr[4], $html);
        $html = str_replace("{%checked6%}", $arr[5], $html);
        $html = str_replace("{%checked7%}", $arr[6], $html);
        
        return $html;
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
     /**
      * @params string $type
      * return array $selected
      */
     public function type(string $type): array
     {
         
         switch($type){
             case 'location':
                 $selecteda = ['selected', ''];
                 return $selecteda;
                 break;
             case 'achat':
                 $selecteda = ['', 'selected'];
                 return $selecteda;
                 break;
            default:
                $selecteda = ['selected', ''];
                return $selecteda;
                break;
         }
     }
     /**
      * @params string pieces
      * return array $selectedb
      */
     public function pieces(string $pieces): array
     {
         
         switch($pieces){
            case 'T1':
                $selectedb = ['selected', '', '', '', '', '', ''];
                 return $selectedb;
                 break;
            case 'T1 bis':
                $selectedb = ['', 'selected', '', '', '', '', ''];
                 return $selectedb;
                 break;
            case 'T2':
                 $selectedb = ['', '', 'selected', '', '', '', ''];
                 return $selectedb;
                 break;
            case 'T3':
                $selectedb = ['', '', '', 'selected', '', '', ''];
                return $selectedb;
                 break;
            case 'T4':
                $selectedb = ['', '', '', '', 'selected', '', ''];
                return $selectedb;
                 break;
            case 'T5':
                $selectedb = ['', '', '', '', '', 'selected', ''];
                return $selectedb;
                 break;
            case 'T55':
                $selectedb = ['', '', '', '', '', '', 'selected'];
                return $selectedb;
                 break;
            default:
                $selectedb = ['selected', '', '', '', '', '', ''];
                return $selected;
                break;
         }
     }
     /**
      * @params string $garage
      * return array $selectedc
      */
     public function garage(string $garage): array
     {
         
         switch($garage){
            case 'oui':
                 $selectedc = ['selected', ''];
                 return $selectedc;
                 break;
             case 'non':
                 $selectedc = ['', 'selected'];
                 return $selectedc;
                 break;
            default:
                 $selectedc = ['selected', ''];
                 return $selectedc;
                break;
         }
     }
     /**
      * @params string $sdb
      * return array $selectedd
      */
     public function sdb(string $sdb): array
     {
         
         switch($sdb){
            case '1':
                 $selectedd = ['selected', '', ''];
                 return $selectedd;
                 break;
            case '2':
                 $selectedd = ['', 'selected', ''];
                 return $selectedd;
                 break;
            case '2+':
                 $selectedd = ['', '', 'selected'];
                 return $selectedd;
                 break;
            default:
                 $selectedd = ['selected', '', ''];
                 return $selectedd;
                break;
         }
     }
}