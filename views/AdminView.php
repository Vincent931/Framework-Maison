<?php
namespace views;

require_once './environment.php';
require_once './autoload.php';

use service\Utils;
use models\Product;
use models\Template;

class AdminView {
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
     private string $htmlImage;
     
    public function __construct()
    {
        $this->utils = new \service\Utils();
        $this->product = new \models\Product();
    }
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
      * @param $number int
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
      * @return string $this->CurrentPage
      */
     public function getCurrentPage(): int
     {
          return $this->currentPage;
     }
     
     /**
      * params string $CurrentPage
      */
     public function setCurrentPage(int $currentPage): void
     {
          $this->currentPage = $currentPage;
     }
     
     /**
      * @return string $this->pageUp
      */
     public function getPageUp(): int
     {
          return $this->pageUp;
     }
     
     /**
      * params string $pageUp
      */
     public function setPageUp(int $pageUp): void
     {
          $this->pageUp = $pageUp;
     }
     
     /**
      * @return int $this->pageDown 
      */
     public function getPageDown(): int
     {
          return $this->pageDown;
     }
     /**
      * params int $pageDown
      */
     public function setPageDown(int $pageDown): void
     {
          $this->pageDown = $pageDown;
     }
      /**
      * @return string $this->htmlImage
      */
     public function getHtmlImage(): string
     {
          return $this->htmlImage;
     }
     /**
      * params string $htmlImage
      */
     public function setHtmlImage(string $html): void
     {
          $this->htmlImage = $html;
     }
     
     //renvoie le formulaire d'effacement
     /**
      * @param string $html
      * @return string $this->htmlProduct
      */
     public function replaceAllInViewEraseProduct(string $html): string
     {
        $htmlProduct = str_replace("{%number%}", $this->getNumber(), $html);
        $this->htmlProduct = str_replace("{%id%}", $this->product->getId(), $htmlProduct);
        $this->htmlProduct = str_replace("{%image%}", $this->product->getImgP(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%explication%}", $this->product->getExplic(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%type%}", $this->product->getType(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%charges%}", $this->product->getCharges(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%notaire%}", $this->product->getNotaire(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%prix%}", $this->product->getPrix(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%ref%}", $this->product->getRef(), $this->htmlProduct);

        return $this->htmlProduct;
     }
     //renvoie le formulaire d'effacement
     /**
      * @param string $html
      * @return string $this->htmlProduct
      */
     public function replaceInViewConfirmEraseProduct(string $html): string
     {
        $this->htmlProduct = str_replace("{%id%}", $this->product->getId(), $html);
        $this->htmlProduct = str_replace("{%image%}", $this->product->getImgP(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%explication%}", $this->product->getExplic(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%type%}", $this->product->getType(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%charges%}", $this->product->getCharges(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%notaire%}", $this->product->getNotaire(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%prix%}", $this->product->getPrix(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%ref%}", $this->product->getRef(), $this->htmlProduct);

        return $this->htmlProduct;
     }
      //renvoie le formulaire d'effacement
     /**
      * @params string $html
      * @return string $this->htmlProduct
      */
     public function replaceInViewUpdateProduct(string $html): string
     {
        $this->htmlProduct = str_replace("{%id%}", $this->product->getId(), $html);
        $this->htmlProduct = str_replace("{%ref%}", $this->product->getRef(), $this->htmlProduct);
        $type = $this->utils->type($this->product->getType());
        $this->htmlProduct = str_replace("{%selecteda1%}", $type[0], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%selecteda2%}", $type[1], $this->htmlProduct);
        $pieces = $this->utils->pieces($this->product->getPieces());
        $this->htmlProduct = str_replace("{%selectedb1%}", $pieces[0], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%selectedb2%}", $pieces[1], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%selectedb3%}", $pieces[2], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%selectedb4%}", $pieces[3], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%selectedb5%}", $pieces[4], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%selectedb6%}", $pieces[5], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%selectedb7%}", $pieces[6], $this->htmlProduct);
        $garage = $this->utils->garage($this->product->getGarage());
        $this->htmlProduct = str_replace("{%selectedc1%}", $garage[0], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%selectedc2%}", $garage[1], $this->htmlProduct);
        $sdb = $this->utils->sdb($this->product->getSdb());
        $this->htmlProduct = str_replace("{%selectedd1%}", $sdb[0], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%selectedd2%}", $sdb[1], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%selectedd3%}", $sdb[2], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%prix%}", $this->product->getPrix(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%charges%}", $this->product->getCharges(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%notaire%}", $this->product->getNotaire(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%explic%}", $this->product->getExplic(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%imgP%}", $this->product->getImgP(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%img1%}", $this->product->getImages()['img1'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%img2%}", $this->product->getImages()['img2'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%img3%}", $this->product->getImages()['img3'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%img4%}", $this->product->getImages()['img4'], $this->htmlProduct);
        $this->htmlProduct = str_replace("{%adress1%}", $this->product->getAdress1(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%adress2%}", $this->product->getAdress2(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%ville%}", $this->product->getVille(), $this->htmlProduct);
        $this->htmlProduct = str_replace("{%ZIP%}", $this->product->getZIP(), $this->htmlProduct);

        return $this->htmlProduct;
     }
     /**
      * @param int $data['id']
      * @param string $data['name']
      * @param string $data['description']
      * @return string $calq
      */
     public function  replaceInViewImage(array $data): string
     {
        $calq = $this->utils->searchInc('list-image');
        $this->setHtmlImage(str_replace("{%id%}", $data['id'], $calq));
        $this->setHtmlImage(str_replace("{%name%}", $data['name'], $this->getHtmlImage()));
        $this->setHtmlImage(str_replace("{%description%}", $data['description'], $this->getHtmlImage()));
        
        return $this->getHtmlImage();
     }
     /**
      * @param int $data['id']
      * @param string $data['name']
      * @param string $data['description']
      * @return string $calq
      */
     public function  replaceInViewImageOnly(array $data): string
     {
        $calq = $this->utils->searchInc('list-image-only');
        $this->setHtmlImage(str_replace("{%id%}", $data['id'], $calq));
        $this->setHtmlImage(str_replace("{%name%}", $data['name'], $this->getHtmlImage()));
        $this->setHtmlImage(str_replace("{%description%}", $data['description'], $this->getHtmlImage()));
        
        return $this->getHtmlImage();
     }
     //vue admin
     /**
      * return string $page
      */
     public function viewAdmin(): string
     {
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header-admin');
        $header = $this->utils->setTitle($header, "Administration");
        $header = $this->utils->setDescription($header, "La page Administration");
        $bodyUp = $this->utils->searchInc('body-up');
        $body = "";
        $bodyBottom = "";
        $footer = "";
        $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
        $page = $temp->getTemplate();
        
        return $page;
     }
     //vue ajout de produit
     /**
      * return string $page
      */
     public function viewAddProduct(): string
     {
        //construction du formulaire
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header-admin');
        $header = $this->utils->setTitle($header, "Administration Super Agence");
        $header = $this->utils->setDescription($header,"La page Ajout de Produits");
        $bodyUp = $this->utils->searchInc('body-up');
        $body = $this->utils->searchHtml('add-product');
        $body =$this->utils->addCsrf($body);
        $bodyBottom = $this->utils->searchInc('body-bottom');
        $footer = "";
        $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
        $page = $temp->getTemplate();
        
        return $page;
     }
     //vue effacement de produit
     /**
      * params array $results
      * return string $page
      */
     public function viewEraseUpdateProduct(array $results) : string
     {
       $this->product = new \models\Product();
       //recuperation du GET page pour traitement
       $pageDown = $this->pageDown; $currentPage = $this->currentPage; $pageUp = $this->pageUp;
         
       if($currentPage == 1){
              $pageDown = 1;
        }
        $since = ($currentPage * $this->perPage) - (1 * $this->perPage);
        $to = $currentPage * $this->perPage;
        $htmlToDisplay = ""; $number = 0;
        //boucle de construction objet
        foreach($results as $value){
           $number++;
           
           if($number > $since && $number <= $to){
           $this->setHtml('product-erase-update');
           $html = $this->getHtml();
           $this->setNumber($number);
           $this->product->addDataFromRepository($value);
           $this->setPageDown($pageDown);
           $this->setCurrentPage($currentPage);
           $this->setPageUp($pageUp);
           $content = $this->replaceAllInViewEraseProduct($html);
           $htmlToDisplay .= $content;
           }
        }
          //construction du GET page
        if($currentPage * $this->perPage < $number)
        {
             $pageUp = $currentPage + 1;
        } else {
              $pageUp = $currentPage;
        }
        $roomslist = "";
        //Construction du template admin
        $htmlToDisplay = $this->utils->addCsrf($htmlToDisplay);
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header-admin');
        $header = $this->utils->setTitle($header, "Erase Product");
        $header = $this->utils->setDescription($header,"La page d'effacement de produit de Super Agence");
        $bodyUp = $this->utils->searchInc('body-up');
        $body = $htmlToDisplay;
        $links = $this->utils->searchInc('pagination-erase-update');
        $bodyBottom = $this->utils->setLink($links, $pageDown, $currentPage, $pageUp, $roomslist);
        $footer = "";
        $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
        $page = $temp->getTemplate();
        
        return $page;
     }
     //renvoie la vue confirmation d'effacement de produit
     /**
      * params array $arrayValue
      * return string $page
      */
     public function viewConfirmEraseProduct(array $arrayValue): string
     {
           $this->setHtml('erase-one-confirm');
           $html = $this->getHtml();
           $this->product->addDataFromRepository($arrayValue);
           $content = $this->replaceInViewConfirmEraseProduct($html);
           $htmlToDisplay = $this->utils->addCsrf($content);
           $temp = new \models\Template();
           $header = $this->utils->searchInc('header-admin');
           $header = $this->utils->setTitle($header, "Erase Product");
           $header = $this->utils->setDescription($header,"La page d'effacement de produit de Super Agence");
           $bodyUp = $this->utils->searchInc('body-up');
           $body = $htmlToDisplay;
           $bodyBottom = $this->utils->searchInc('body-bottom');
           $footer = "";
           $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
           $page = $temp->getTemplate();
           
           return $page;
     }
     //renvoie la vue update produit
     /**
      * params array $arrayValue
      * return string $page
      */
     public function viewUpdateProduct(array $arrayValue): string
     {
          $this->setHtml('update-one-confirm');
          $html = $this->getHtml();
          $this->product->addDataFromRepository($arrayValue);
          $content = $this->replaceInViewUpdateProduct($html);
          $htmlToDisplay = $this->utils->addCsrf($content);
          $temp = new \models\Template();
          $header = $this->utils->searchInc('header-admin');
          $header = $this->utils->setTitle($header, "Update Product");
          $header = $this->utils->setDescription($header,"La page de mise a jour de produit de Super Agence");
          $bodyUp = $this->utils->searchInc('body-up');
          $body = $htmlToDisplay;
          $bodyBottom = $this->utils->searchInc('body-bottom');
          $footer = "";
          $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
          $page = $temp->getTemplate();
          
          return $page;
     }
     //add image
     public function viewAddImage(): string
     {
        //construction du formulaire
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header-admin');
        $header = $this->utils->setTitle($header, "Administration Super Agence");
        $header = $this->utils->setDescription($header,"La page Ajout d'images");
        $bodyUp = $this->utils->searchInc('body-up');
        $body = $this->utils->searchHtml('add-image');
        $body =$this->utils->addCsrf($body);
        $bodyBottom = $this->utils->searchInc('body-bottom');
        $footer = "";
        $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
        $page = $temp->getTemplate();
        
        return $page;
     }
     //lising images
     public function viewEraseProduct($datas): string
     {
        //construction du formulaire
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header-admin');
        $header = $this->utils->setTitle($header, "Administration Super Agence");
        $header = $this->utils->setDescription($header,"La page listing images");
        $bodyUp = $this->utils->searchInc('body-up-erase-img');
        $body = "";
        foreach($datas as $data){
            $content = $this->replaceInViewImage($data);
            $body .= $content;
        }
        
        $body = $this->utils->addCsrf($body);
        $bodyBottom = $this->utils->searchInc('body-bottom-erase-img');
        $footer = "";
        $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
        $page = $temp->getTemplate();
        
        return $page;
     }
     
     public function viewConfirmEraseImage($data): string
     {
        //construction du formulaire
        $temp = new \models\Template();
        $header = $this->utils->searchInc('header-admin');
        $header = $this->utils->setTitle($header, "Administration Super Agence");
        $header = $this->utils->setDescription($header,"La page listing images");
        $bodyUp = $this->utils->searchInc('body-up-erase-img');
        $body = "";
        $content = $this->replaceInViewImageOnly($data);
        $body = $content;
        $body = $this->utils->addCsrf($body);
        $bodyBottom = $this->utils->searchInc('body-bottom-erase-img');
        $footer = "";
        $temp->setTemplate($header, $bodyUp, $body, $bodyBottom, $footer);
        $page = $temp->getTemplate();
        
        return $page;
     }
}