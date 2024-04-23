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
    //renvoie la vue index.html
    /**
     * return string $page
     */
    public function viewIndex(): string
    {
         $temp = new \models\Template();
         $header = $this->utils->searchInc('header');
         $header = $this->utils->setTitle($header, "Une Agence à proximité, vouloir le meilleur pour se loger");
         $header = $this->utils->setDescription($header, "Un exemple de site construit par Vincent Nguyen, Développeur");
         $bodyUp = $this->utils->searchInc('body-up');
         $body = $this->utils->searchHtml('index');
         $bodyBottom = $this->utils->searchInc('body-bottom');
         $footer = $this->utils->searchInc('footer');
         $this->utils->setJs('<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>');
         $this->utils->setJs('<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>');
         $this->utils->setJs('<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>');
         $this->utils->setJs('<script src="https://kit.fontawesome.com/80f9a27b0d.js" crossorigin="anonymous"></script>');
         $js = $this->utils->setJs('<script type="module" src="./public/js/app.index.js"></script>');
         $footer = $this->utils->replaceJs($js, $footer);
         $footer = $this->utils->setLinkedInJsInFooter($footer);
         $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
         $page = $temp->getTemplate();  
        
         return $page;
    }
    
    //renvoie error
    /**
     * @params array $error
     * return string $page
     */
    public function showError(array $error): string
    {
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header');
        $header = $this->utils->setTitle($header, "Une Erreur s'est produite");
        $header = $this->utils->setDescription($header, "La Page d'erreur vous informe que qulequechose s'est mal passé");
        $bodyUp = $this->utils->searchInc('body-up-error');
        $body = '<main><div class="error-message"><h3 class="h3-error-message">'.$error['message'].'</h3><br><a class="a-ersucc-affich" href="'.$error['href'].'">'.$error['lien'].'</a></div></main>';
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
    
    //renvoie success
    /**
     * @params array $success
     * return string $page
     */
    public function showSuccess(array $success): string
    {
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header');
        $header = $this->utils->setTitle($header, "La requête a été initié avec succès");
        $header = $this->utils->setDescription($header, "Super Agence vous informe du succès de la requête");
        $bodyUp = $this->utils->searchInc('body-up-success');
        $body = '<div class="success-message"><h3 class="h3-succes-message">'.$success["message"].'</h3><br><a class="a-ersucc-affich" href="'.$success["href"].'">'.$success["lien"].'</a></div>';
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
    //retourne vue RGPD
    /**
     * return string $page
     */
     public function viewRGPD(): string
     {
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header');
        $header = $this->utils->setTitle($header, "RGPD et politique de confidentialité");
        $header = $this->utils->setDescription($header, "La page RGPD et politique de confidentialité");
        $bodyUp = $this->utils->searchInc('body-up');
        $body = $this->utils->searchHtml('RGPD');
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
     //retourne la vue a-propos
     /**
      * return string $page
      */
     public function viewAPropos(): string
     {
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header');
        $header = $this->utils->setTitle($header, "A propos de Super Agence");
        $header = $this->utils->setDescription($header, "La page explicative de Super Agence");
        $bodyUp = $this->utils->searchInc('body-up');
        $body = $this->utils->searchHtml('a-propos');
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
     //fenetre image
     /**
      * return string $page
      */
     public function viewWindowImage(): string
     {
        $vue ="";
        $scandir = scandir("./public/img/");
        foreach($scandir as $fichier){
            if($fichier !== '.' && $fichier !=='..' && $fichier !== 'index.php'){
            $vue.= '<div class="cont-img-window"><img class="img-window" src="./public/img/'.$fichier.'"/><span class="sp-window-img">'.$fichier.'</span></div>';
            }
        }
        $temp = new \models\Template();
        $header = "<link rel=\"stylesheet\" href=\"./public/css/style.css\" type=\"text/css\"/>";
        $bodyUp = "";
        $body = '<div class="window">'.$vue.'</div>';
        $bodyBottom = "";
        $footer = "";
        $JS ="";
        $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
        $page = $temp->getTemplate();
        
        return $page;
     }
}