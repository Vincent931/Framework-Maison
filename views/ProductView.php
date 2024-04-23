<?php
namespace views;

require_once './environment.php';
require_once './autoload.php';

use service\Utils;
use models\Product;
use models\Template;

class ProductView {
     
    public function __construct()
    {
        $this->utils = new \service\Utils();
        $this->product = new \models\Product();
    }
     private int $perPage = 10;
     private int $number;
     private int $numberFavori;
     private int $numberToAjax;
     private int $pageDown;
     private int $currentPage;
     private int $pageUp;
     private string $room;
     private string $html;
     private string $htmlProduct;
     private string $pageConstruct;
     /**
      * @params int $perPage
      */
     public function setPerPage(int $perPage): void
     {
          
          $this->perPage = $perPage;
     }
     /**
      * @return int $this->perPage
      */
     public function getPerPage(): int
     {
          return $this->perPage;
     }
     /**
      * @params int $number
      */
     public function setNumber(int $number): void
     {
          
          $this->number = $number;
     }
     /**
      * @return int $this->number
      */
      public function getNumber(): int
      {
          return $this->number;
      }
      /**
      * @params int $numberFavori
      */
      public function setNumberFavori(int $numberFavori): void
     {
          
          $this->numberFavori = $numberFavori;
     }
     /**
      * @return int $this->numberFavori
      */
      public function getNumberFavori(): int
      {
          return $this->numberFavori;
      }
     /**
      * @params int $numberToAjax
      */
     public function setNumberToAjax(int $numberToAjax): void
     {
          $this->numberToAjax = $numberToAjax;
     }
     /**
      * @return int $this->numberToAjax
      */
      public function getNumberToAjax(): int
      {
          return $this->numberToAjax;
      }
     /**
      * @params int $limit
      */
     public function setLimit(int $limit): void
     {
          $this->limit = $limit;
     }
     /**
      * @return int $this->limit
      */
     public function getLimit(): int
      {
          return $this->limit;
      }
     /**
      * @params string $filename
      */
     public function setHtml(string $fileName): void
     {
          $this->html = $this->utils->searchInc($fileName);
     }
     /**
      * return string $this->html
      */
     public function getHtml(): string
      {
          return $this->html;
     }
     /**
      * params int $CurrentPage
      */
     public function setCurrentPage(int $currentPage): void
     {
          $this->currentPage = $currentPage;
     }
     /**
      * @return int $this->CurrentPage
      */
     public function getCurrentPage(): int
     {
          return $this->currentPage;
     }
     /**
      * params int $pageUp
      */
     public function setPageUp(int $pageUp): void
     {
          $this->pageUp = $pageUp;
     }
     /**
      * @return int $this->pageUp
      */
     public function getPageUp(): int
     {
          return $this->pageUp;
     }
     /**
      * params string $pageDown
      */
     public function setPageDown(string $pageDown): void
     {
          $this->pageDown = $pageDown;
     }
     /**
      * @return string $this->pageDown
      */
     public function getPageDown(): string
     {
          return $this->pageDown;
     }
      /**
      * param string $room
      */
     public function setRoom(string $room): void
     {
          $this->room = $room;
     }
     /**
      * return string $this->room
      */
     public function getRoom(): string
     {
          return $this->room;
     }
     /**
      * @params string $html
      */
     public function setHtmlProduct(string $html): void
     {
          $this->htmlProduct = $html;
     }
     /**
      * return string $this->htmlProduct
      */
     public function getHtmlProduct(): string
     {
          return $this->htmlProduct;
     }
     /**
     * @param string $htmlProduct
     * @return string
     */
     public function replaceAll(string $htmlProduct): string
     {
        $htmlProduct = str_replace("{%number%}", $this->getNumberToAjax(), $htmlProduct);
        $this->htmlProduct = str_replace("{%id%}", $this->product->getId(), $htmlProduct);
        $this->htmlProduct = str_replace("{%image%}", $this->product->getImgP(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%explication%}", html_entity_decode($this->product->getExplic()), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%type%}", $this->product->getType(), $this->htmlProduct);
        
        if($this->product->getPieces() == "T55"){ 
              $this->htmlProduct = str_replace("{%pieces%}", "T5+", $this->htmlProduct);
        } else{
             $this->htmlProduct = str_replace("{%pieces%}", $this->product->getPieces(), $this->htmlProduct);
        }
        $this->htmlProduct = str_replace("{%garage%}", $this->product->getGarage(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%SdB%}", $this->product->getSdb(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%charges%}", $this->product->getCharges(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%notaire%}", $this->product->getNotaire(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%prix%}", $this->product->getPrix(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%ref%}", $this->product->getRef(), $this->htmlProduct);

        return $this->htmlProduct;
    }
     /**
     * @param string $html
     * @return string $htmlproduct
     */
     public function replaceAllInViewFavoris(string $html): string
     {
        $htmlProduct = str_replace("{%number%}", $this->getNumber(), $html);
        $this->htmlProduct = str_replace("{%numberFavori%}", $this->getNumberFavori(), $htmlProduct);
        $this->htmlProduct = str_replace("{%id%}", $this->product->getId(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%imgP%}", $this->product->getImgP(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%img1%}", $this->product->getImages()['img1'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%img2%}", $this->product->getImages()['img2'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%img3%}", $this->product->getImages()['img3'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%img4%}", $this->product->getImages()['img4'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%explic%}", html_entity_decode($this->product->getExplic()), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%type%}", $this->product->getType(), $this->htmlProduct);
        
        if($this->product->getPieces() == "T55"){ 
              $this->htmlProduct = str_replace("{%pieces%}", "T5+", $this->htmlProduct);
        } else{
             $this->htmlProduct = str_replace("{%pieces%}", $this->product->getPieces(), $this->htmlProduct);
        }
        $this->htmlProduct = str_replace("{%garage%}", $this->product->getGarage(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%SdB%}", $this->product->getSdb(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%charges%}", $this->product->getCharges(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%notaire%}", $this->product->getNotaire(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%prix%}", $this->product->getPrix(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%ref%}", $this->product->getRef(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%adress1%}", $this->product->getAdress1(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%adress2%}", $this->product->getAdress2(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%ZIP%}", $this->product->getZIP(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%ville%}", $this->product->getVille(), $this->htmlProduct);
        
        return $this->htmlProduct;
    }
     /**
      * @params string $htmlProduct
      * return string $this->pageConstruct
      */
     public function constructHtmlProducts(string $htmlProduct): string
     {
          return $this->pageConstruct .= $htmlProduct;
     }
    //renvoie la vue products.html
    /**
      * @params array $results
      * @params string $roomslimit
      * @params int $counter
      * return string $page
      */
     public function viewProducts(array $results, string $roomslimit, int $counter): string
     {
         $limit = "";
         $rooms = [];
         switch($roomslimit){
               case 'T1':
                    $rooms = ['T1','T1 bis','T2','T3','T4','T5','T55'];
                    $this->setRoom('T1');
                   break;
               case 'T1 bis':
                    $rooms = ['T1 bis','T2','T3','T4','T5','T55'];
                    $this->setRoom('T1 bis');
                   break;
               case 'T2':
                    $rooms = ['T2','T3','T4','T5','T55'];
                    $this->setRoom('T2');
                   break;
               case 'T3':
                    $rooms = ['T3','T4','T5','T55'];
                    $this->setRoom('T3');
                   break;
               case 'T4':
                    $rooms = ['T4','T5','T55'];
                    $this->setRoom('T4');
                   break;
               case 'T5':
                    $rooms = ['T5','T55'];
                    $this->setRoom('T5');
                   break;
               case 'T55':
                    $rooms = ['T55'];
                    $this->setRoom('T55');
                   break;
               default:
                    $rooms = ['T1','T1 bis','T2','T3','T4','T5','T55'];
                    $this->setRoom('T1');
                   break;
                   
         }
         $limit = $this->getRoom();
         //recuperation du GET page pour traitement
         $pageDown = $this->getPageDown(); $currentPage = $this->getCurrentPage(); $pageUp = $this->getPageUp();
         
         if($currentPage == 1){
              $pageDown = 1;
         }
        $since = ($currentPage * $this->getPerPage()) - (1 * $this->getPerPage());
        $to = $currentPage * $this->getPerPage();
        $htmlToDisplay = ""; $number = 0;
        $numberToAjax = 0;
        //boucle de construction objet
        foreach($results as $value){
           if(in_array($value['pieces'], $rooms)){
                $number++;
                if($number > $since && $number <= $to){
                $numberToAjax++;
                $this->setNumberToAjax($numberToAjax);
                $this->setHtml('product');
                $html = $this->getHtml();
                $this->setNumber($number);
                $this->product->addDataFromRepository($value);
                $this->setPageDown($pageDown);
                $this->setCurrentPage($currentPage);
                $this->setPageUp($pageUp);
                $content = $this->replaceAll($html);
                $htmlToDisplay .= $content;
                }
           }
        }
        $rooms = "";
        //construction du GET page
        if($currentPage * $this->getPerPage() < $number)
        {
             $pageUp = $currentPage + 1;
        }else {
              $pageUp = $currentPage;
        }
        //construction de la page
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header-modale');
        $header = $this->utils->setTitle($header, "Obtenir la liste des logements, des maisons et appartements de Super Agence");
        $header = $this->utils->setDescription($header,"La page des supers maisons et appartements de Super Agence");
        $bodyUp = $this->utils->searchInc('body-up-products');
        $bodyUp = $this->utils->replaceLimit($bodyUp, $limit);
        $body = $htmlToDisplay;
        $links = $this->utils->searchInc('pagination');
        $bodyBottom = $this->utils->setLink($links, $pageDown, $currentPage, $pageUp, $limit);
        $footer = $this->utils->searchInc('footer');
        $this->utils->setJs('<script src="https://kit.fontawesome.com/80f9a27b0d.js" crossorigin="anonymous"></script>');
        $this->utils->setJs('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>');
        $this->utils->setJs('<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>');
        $this->utils->setJs('<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>');
        $js = $this->utils->setJs('<script type="module" src="./public/js/app.products.js"></script>');
        $footer = $this->utils->replaceJs($js, $footer);
        $footer = $this->utils->setLinkedInJsInFooter($footer);
        $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
        $page = $temp->getTemplate();
        
        return $page;
    }
     /**
      * @params array $product
      * @params string $url
      * return string $page
      */
     public function viewOneProduct(array $product, string $url): string
     {
        $html = $this->utils->searchHtml('product-one');
        $this->htmlProduct = str_replace("{%id%}", $product['id'], $html);
        $this->htmlProduct = str_replace("{%ref%}", $product['ref'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%type%}", $product['type'], $this->htmlProduct);

        if($product['pieces'] == "T55"){ 
              $this->htmlProduct = str_replace("{%pieces%}", "T5+", $this->htmlProduct);
        } else{
             $this->htmlProduct = str_replace("{%pieces%}", $product['pieces'], $this->htmlProduct);
        }
        $this->htmlProduct = str_replace("{%garage%}", $product['garage'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%SdB%}", $product['SdB'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%prix%}", $product['prix'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%charges%}", $product['charges'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%notaire%}", $product['notaire'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%explic%}", html_entity_decode($product['explic']), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%imgP%}", $product['img_p'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%img1%}", $product['img_1'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%img2%}", $product['img_2'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%img3%}", $product['img_3'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%img4%}", $product['img_4'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%adress1%}", $product['adress1'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%adress2%}", $product['adress2'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%ville%}", $product['ville'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%ZIP%}", $product['ZIP'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%url%}", $url, $this->htmlProduct);
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header');
        $header = $this->utils->setTitle($header, "Voir le produit Super Agence");
        $header = $this->utils->setDescription($header,"La page de details produit de Super Agence");
        $bodyUp = $this->utils->searchInc('body-up');
        $body = $this->htmlProduct;
        $bodyBottom = $this->utils->searchInc('body-bottom');
        $footer = $this->utils->searchInc('footer');
        $this->utils->setJs('<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>');
        $this->utils->setJs('<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>');
        $this->utils->setJs('<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>');
        $this->utils->setJs('<script src="https://kit.fontawesome.com/80f9a27b0d.js" crossorigin="anonymous"></script>');
        $js = $this->utils->setJs('<script type="module" src="./public/js/app.product.js"></script>');
        $footer = $this->utils->replaceJs($js, $footer);
        $footer = $this->utils->setLinkedInJsInFooter($footer);
        $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
        $page = $temp->getTemplate();
        
        return $page;
     }
     /**
      * @params array $data
      * return string $page
      */
     public function showFavoris(array $data, $url): string
     {
          $htmlToDisplay = ""; $num = 0;
          //boucle de construction objet
          foreach($data as $value){
               $num++;
                //var_dump($value); die();
               $html = $this->utils->searchInc('favori');
               $this->setNumberFavori($num);
               $this->setNumber(0);
               $this->product->addDataFromRepository($value);
               $content = $this->replaceAllInViewFavoris($html);
               $htmlToDisplay .= $content;
        }
        //construction de la page
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header');
        $header = $this->utils->setTitle($header, "Listing Favoris");
        $header = $this->utils->setDescription($header,"La liste Favoris de Super Agence");
        $bodyUp = $this->utils->searchInc('body-up-favori');
        $htmlToDisplay = $this->utils->addCsrf($htmlToDisplay);
        $body = $htmlToDisplay;
        $bodyBottom = $this->utils->searchInc('body-bottom-favori');
        $bodyBottom = str_replace("{%url%}", $url, $bodyBottom);
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