<?php

require_once("lib/PHPMailer/PHPMailerAutoload.php");

class Mail{
  public $mail;
  public $subject;
  public $Body= '<h1>Body</h1>';

  public function __construct(){
    $this->mail = new PHPMailer;
    $this->mail->isSMTP();
    $this->mail->isHTML();
    $this->mail->SMTPDebug = 2;
    $this->mail->Debugoutput = 'html';
    $this->mail->Host = 'smtp.gmail.com';
    $this->mail->Port = 587;
    $this->mail->SMTPSecure = 'tls';
    $this->mail->SMTPAuth = true;
    $this->mail->Username = "mail";
    $this->mail->Password = "password";
    $this->mail->setFrom('menan381@gmail.com');
    $this->subject='Subject';
  }


  public function send($emails){
    $this->mail->Subject = $this->subject;
    foreach ($emails as $key => $email) {
    	$this->mail->addAddress($email);
    	#$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
    	$this->mail->Body = $this->body;#"<h1> Testing ".$key." </h1>";
    	$this->mail->send();
    	$this->mail->ClearAddresses();
    }
  }
}
