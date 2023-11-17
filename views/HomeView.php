<?php
namespace views;

require_once './environment.php';
require_once './autoload.php';

use service\Utils;
use models\Template;

class HomeView {
    public function __construct()
    {
        $this->utils = new \service\Utils();
    }
    /************************ A Reproduire pour chaque vue ****************************************/
    //renvoie la vue index.html
    /**
     * return string $page
     */
    public function viewIndex(): string
    {
         $temp = new \models\Template();
         $header = $this->utils->searchInc('header');
         $header = $this->utils->setTitle($header, "");
         $header = $this->utils->setDescription($header, "");
         $bodyUp = $this->utils->searchInc('body-up');
         $body = $this->utils->searchHtml('index');
         $bodyBottom = $this->utils->searchInc('body-bottom');
         $footer = $this->utils->searchInc('footer')
         /**************************Add JS******************************************/
         /*$this->utils->setJs('<script type="text/javascript" src=""></script>');
         $js = $this->utils->setJs('<script type="module" src="./public/js/app.index.js"></script>');*/
         /*************************JS***********************************************/
         $footer = $this->utils->replaceJs($js, $footer);
         $footer = $this->utils->setLinkedInJsInFooter($footer);
         $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
         $page = $temp->getTemplate();  
        
         return $page;
    }
}
