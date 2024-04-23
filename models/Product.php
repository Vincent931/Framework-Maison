<?php
namespace models;

class Product{
     private int $id;
     private string $ref;
     private string $type;
     private string $pieces;
     private string $garage;
     private string $sdb;
     private int $prix;
     private int $charges;
     private int $notaire;
     private string $explic;
     private string $imgP;
     private array $images;
     private string $adress1;
     private string $adress2;
     private string $ville;
     private string $ZIP;
     

     /**
      * @params int $id
      */
     public function setId(int $id)
     {
          $this->id = $id;
     }
     /**
      * return int $this->id
      */
      public function getId()
      {
          return $this->id;
     }
     /**
      * @params string $ref
      */
     public function setRef(string $ref): void
     {
          $this->ref = $ref;
     }
     /**
      * return string $this->ref
      */
     public function getRef(): string
     {
          return $this->ref;
     }
     /**
      * @params $type string
      */
     public function setType(string $type): void
     {
          $this->type = $type;
     }
     /**
      * return string $this->type
      */
     public function getType(): string
     {
          return $this->type;
     }
     /**
      * @params string $garage
      */
     public function setPieces(string $pieces): void
     {
          $this->pieces = $pieces;
     }
     /**
      * return string $this->pieces
      */
     public function getPieces(): string
     {
          return $this->pieces;
     }
     /**
      * @params string $garage
      */
     public function setGarage(string $garage): void
     {
          $this->garage = $garage;
     }
     /**
      * return string $this->garage
      */
     public function getGarage(): string
     {
          return $this->garage;
     }
     /**
      * @params string $sdb
      */
     public function setSdb(string $sdb): void
     {
          $this->sdb = $sdb;
     }
     /**
      * return string $this->sdb
      */
     public function getSdb(): string
     {
          return $this->sdb;
     }
     /**
      * @params int $prix
      */
     public function setPrix(int $prix): void
     {
          $this->prix = $prix;
     }
     /**
      * return int $this->prix
      */
      public function getPrix(): int
      {
           return $this->prix;
      }
     /**
      * @params int $charges
      */
     public function setCharges(int $charges): void
     {
          $this->charges = $charges;
     }
     /**
      * return int $this->charges
      */
     public function getCharges(): int
     {
          return $this->charges;
     }
     /**
      * @params int $notaire
      */
     public function setNotaire(string $notaire): void
     {
          $this->notaire = $notaire;
     }
     /**
      * return int $this->notaire
      */
     public function getNotaire(): int
     {
          return $this->notaire;
     }
     /**
      * @params string $explic
      */
     public function setExplic(string $explic): void
     {
          $this->explic = $explic;
     }
     /**
      * return string $this->explic
      */
     public function getExplic(): string
     {
          return $this->explic;
     }
     /**
      * @params string $imgP
      */
     public function setImgP(string $imgP): void
     {
          $this->imgP = $imgP;
     }
     /**
      * return string $this->imgP
      */
     public function getImgP(): string
     {
          return $this->imgP;
     }
     /**
      * @params string $img1
      * @params string $img2
      * @params string $img3
      * @params string $img4
      */
     public function setImages(string $img1, string $img2, string $img3, string $img4): void
     {
          $this->images = ['img1' => $img1, 'img2' => $img2, 'img3' => $img3, 'img4' => $img4];
     }
     /**
      * return array $this->imgages
      */
     public function getImages(): array
     {
          return $this->images;
     }
     /**
      * @params string $adress1
      */
     public function setAdress1(string $adress1): void
     {
          $this->adress1 = $adress1;
     }
     /**
      * return string $this->adress1
      */
     public function getAdress1() :string
     {
          return $this->adress1;
     }
     /**
      * @params string $adress2
      */
     public function setAdress2(string $adress2): void
     {
          $this->adress2 = $adress2;
     }
     /**
      * return string $this->adress2
      */
     public function getAdress2(): string
     {
          return $this->adress2;
     }
     /**
      * @params string $ville
      */
     public function setVille(string $ville): void
     {
          $this->ville = $ville;
     }
     
     /**
      * return $this->ville string
      */
     public function getVille(): string
     {
          return $this->ville;
     }
     /**
      * @params int $ZIP
      */
     public function setZIP(int $ZIP): void
     {
          $this->ZIP = $ZIP;
     }
     /**
      * return int $this->ZIP
      */
     public function getZIP(): int
     {
          return $this->ZIP;
     }
     /**
      * @params array $data
      */
     public function addDataFromRepository(array $data): void
     {
          $this->setId($data['id']);
          if (isset($data['id_product'])){
               $this->setId($data['id_product']);
          }
          $this->setRef(htmlspecialchars($data['ref']));
          $this->setType(htmlspecialchars($data['type']));
          $this->setPieces(htmlspecialchars($data['pieces']));
          $this->setGarage(htmlspecialchars($data['garage']));
          $this->setSdb(htmlspecialchars($data['SdB']));
          $this->setPrix(htmlspecialchars($data['prix']));
          $this->setCharges(htmlspecialchars($data['charges']));
          $this->setNotaire(htmlspecialchars($data['notaire']));
          $this->setExplic($data['explic']);
          $this->setImgP(htmlspecialchars($data['img_p']));
          $this->setimages(htmlspecialchars($data['img_1']), htmlspecialchars($data['img_2']), htmlspecialchars($data['img_3']), htmlspecialchars($data['img_4']));
          $this->setAdress1(htmlspecialchars($data['adress1']));
          $this->setAdress2(htmlspecialchars($data['adress2']));
          $this->setVille(htmlspecialchars($data['ville']));
          $this->setZIP(htmlspecialchars($data['ZIP']));
     }
     /**
      * @params array $data
      */
     public function addDataFromPost(array $data): void
     {
          $this->setRef(htmlspecialchars($data[0]));
          $this->setType(htmlspecialchars($data[1]));
          $this->setPieces(htmlspecialchars($data[2]));
          $this->setGarage(htmlspecialchars($data[3]));
          $this->setSdb(htmlspecialchars($data[4]));
          $this->setPrix(htmlspecialchars($data[5]));
          $this->setCharges(htmlspecialchars($data[6]));
          $this->setNotaire(htmlspecialchars($data[7]));
          $this->setExplic($data[8]);
          $this->setImgP(htmlspecialchars($data[9]));
          $this->setimages(htmlspecialchars($data[10]), htmlspecialchars($data[11]), htmlspecialchars($data[12]), htmlspecialchars($data[13]));
          $this->setAdress1(htmlspecialchars($data[14]));
          $this->setAdress2(htmlspecialchars($data[15]));
          $this->setVille(htmlspecialchars($data[16]));
          $this->setZIP(htmlspecialchars($data[17]));
     }
}