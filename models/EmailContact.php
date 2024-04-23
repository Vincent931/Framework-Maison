<?php
namespace models;

require_once './environment.php';
require_once './autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use views\EmailView;
use service\AbstractRepository;
use service\MyError;

class EmailContact{
     
     private $body;
     private $bodyemail;
     private $email;
     private $host;
     private $smtpauth;
     private $username;
     private $password;
     private $smtpsecure;
     private $port;
     private $ste;
     private $ishtml;
     private $emailto;
     private $emailfrom;
     private $content;
     
     public function __construct($email, $content)
     {
          $this->body = new \views\EmailView();
          $this->body->setContent($content);
          $this->body->setEmailFrom($email);
          $this->setEmailFrom($email);
          $this->body->setBody();
          $this->setBodyEmail($this->body->getBody());
     }
     /**
      * params string $bodyemail
      */
     public function setBodyEmail($bodyemail): void
     {
          $this->bodyemail = $bodyemail;
     }
     /**
      * return string $this->bodyemail
      */
     public function getBodyEmail(): string
     {
          return $this->bodyemail;
     }
     /**
      * params string $body
      */
     public function setBody($body): void
     {
          $this->body = $body;
     }
     /**
      * return string $this->body
      */
     public function getBody(): string
     {
          return $this->body;
     }
     /**
      * params string $email
      */
     public function setEmail($email): void
     {
          $this->email = $email;
     }
     /**
      * return string $this->email
      */
     public function getEmail(): string
     {
          return $this->email;
     }
     /**
      * params string $host
      */
     public function setHost($host): void
     {
           $this->host = $host;
     }
     /**
      * return string $this->host
      */
     public function getHost(): string
     {
          return  $this->host;
     }
     /**
      * params bool $smtpauth
      */
     public function setSmtpAuth($smtpauth): void
     {
           $this->smtpauth = $smtpauth;
     }
     /**
      * return bool smtpauth
      */
     public function getSmtpAuth(): string
     {
          return $this->smtpauth;
     }
     /**
      * params string $username
      */
     public function setUserName($username): void
     {
           $this->username = $username;
     }
     /**
      * return string $this->username
      */
     public function getUserName(): string
     {
          return $this->username;
     }
      /**
      * params string $password
      */
     public function setPassword($password): void
     {
           $this->password = $password;
     }
     /**
      * return string $this->password
      */
     public function getPassword(): string
     {
          return $this->password;
     }
      /**
      * params string smtpsecure
      */
     public function setSmtpSecure($smtpsecure): void
     {
           $this->smtpsecure = $smtpsecure;
     }
     /**
      * return string $this->smtpsecure
      */
     public function getSmtpSecure(): string
     {
          return $this->smtpsecure;
     }
      /**
      * params string $port
      */
     public function setPort($port): void
     {
           $this->port = $port;
     }
     /**
      * return string $this->port
      */
     public function getPort(): string
     {
          return $this->port;
     }
       /**
      * params string $ste
      */
     public function setSte($ste): void
     {
           $this->ste = $ste;
     }
     /**
      * return string $this->ste
      */
     public function getSte(): string
     {
          return $this->ste;
     }
     /**
      * params string $emailto
      */
     public function setEmailTo($emailto): void
     {
           $this->emailto = $emailto;
     }
     /**
      * return string $this->emailto
      */
     public function getEmailTo(): string
     {
          return $this->emailto;
     }
     /**
      * params string $emailfrom
      */
     public function setEmailFrom($emailfrom): void
     {
           $this->emailfrom = $emailfrom;
     }
     /**
      * return string $this->emailfrom
      */
     public function getEmailFrom(): string
     {
          return $this->emailfrom;
     }
     /**
      * params bool $isHtml
      */
     public function setIsHtml($ishtml): void
     {
           $this->ishtml = $ishtml;
     }
     /**
      * return bool $this->isHtml
      */
     public function getIsHtml(): string
     {
          return $this->ishtml;
     }
     /**
      * params string $subject
      */
     public function setSubject($subject): void
     {
           $this->subject = $subject;
     }
     /**
      * return string $this->subject
      */
     public function getSubject(): string
     {
          return $this->subject;
     }
     /**
      * params string $content
      */
     public function setContent($content): void
     {
           $this->content = $content;
     }
     /**
      * return string $this->content
      */
     public function getContent(): string
     {
          return $this->content;
     }
     
     public function constructEmail(){

     $this->setHost($_ENV['SMTP_SERVER']);
     $this->setSmtpAuth(true);
     $this->setUserName($_ENV['SMTP_USER']);
     $this->setPassword($_ENV['SMTP_PASSWORD']);
     $this->setSmtpSecure('tls');
     $this->setPort(587);
     $this->setSte('Super Agence');
     $this->setEmailTo('questions@vincent-dev-web.fr');
     $this->setIsHtml(true);
     $this->setSubject('Message sur Super Agence');
     }
     
     public function sendEmailContact(){

     $mail = new \public\PHPMailer\src\PHPMailer();

     try {
         //Server settings
         $mail->isSMTP(); // Set mailer to use SMTP
         $mail->Host       = $this->getHost(); // Specify main and backup SMTP servers
         $mail->SMTPAuth   = $this->getSmtpAuth(); // Enable SMTP authentication
         $mail->Username   = $this->getUserName(); // SMTP username   
         $mail->Password   = $this->getPassword(); // SMTP password
         $mail->SMTPSecure = $this->getSmtpSecure(); // Enable TLS encryption, `ssl` also accepted
         $mail->Port       = $this->getPort(); // TCP port to connect to 587
         //Recipients
         $mail->setFrom($this->getEmailFrom(), $this->getSte()); // depuis email, société
         $mail->addAddress($this->getEmailTo(), $this->getSte()); // pour (email) de société (name or email)
         $mail->isHTML($this->getIsHtml()); // Set email format to HTML
         $mail->Subject = $this->getSubject(); //Set subject
         $mail->Body = $this->getBodyEmail(); // HTML version of the email
         //send email
         return $mail->send();
         //var_dump($mail->send()); die();
          } catch (Exception $e) {
               $arrayFailed = ['message' =>$e, 'href' => './index.php?action=contact', 'lien' => 'Réessayer', 'type' => 'other'];
               $erreur = new \service\MyError($arrayFailed);
               $erreur->manageFailed();
          }
     }
}
/* To know
$mail->addReplyTo('vincentnguyen332@gmail.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');
Attachments
image
$mail->AddEmbeddedImage("bandeau-mail.png", $image, "bandeau-mail.png");
$mail->AddAttachment($pdf_insert);        // Add attachments
$mail->AddAttachment('publicimgs/bandeau-mail.png', 'www-1-zero-Bandeau');    // Optional name */