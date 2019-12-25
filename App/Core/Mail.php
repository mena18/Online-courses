<?php

require_once("lib/PHPMailer/PHPMailerAutoload.php");

class Mail{
  public $mail;
  public $subject = 'subject';
  public $Body= '<h1>Body</h1>';
  public $debug = 'false';
  public function __construct(){
    $this->mail = new PHPMailer;
    $this->mail->isSMTP();
    $this->mail->isHTML();
    $this->mail->CharSet = 'UTF-8';
    //$this->mail->SMTPDebug = 2;
    //$this->mail->Debugoutput = 'html';
    $this->mail->Host = 'smtp.gmail.com';
    $this->mail->Port = 587;
    $this->mail->SMTPSecure = 'tls';
    $this->mail->SMTPAuth = true;
    $this->mail->Username = "email";   // change 1
    $this->mail->Password = "password";            // change 2
    $this->mail->setFrom('');     // change 3
    $this->subject='Subject';
  }

  public function send($emails){
    $this->mail->Subject = $this->subject;
    $this->mail->AddEmbeddedImage('email_files/unnamed.png', 'logo_2u');
    $this->mail->msgHTML(file_get_contents('email.html'), dirname(__FILE__));
    foreach ($emails as $key => $email) {
      $this->mail->addAddress($email);
    }
    if(!$this->mail->send()){echo "Mailer Error: " . $this->mail->ErrorInfo;}
    else{echo "Message  Send <br>";}
  }

  /*

  public function send($emails){
    $this->mail->Subject = $this->subject;
    $this->mail->AddEmbeddedImage('email_files/unnamed.png', 'logo_2u');
    $this->mail->msgHTML(file_get_contents('email.html'), dirname(__FILE__));
    foreach ($emails as $key => $email) {
    	$this->mail->addAddress($email);
    	#$this->mail->Body = $this->body;#"<h1> Testing ".$key." </h1>";
      try{
        if($this->debug){
          if(!$this->mail->send()){echo "Mailer Error: " . $this->mail->ErrorInfo;}
          else{echo "Message (". ($key+1) .") Send to " . $email . "<br>";}
        }else{
          $this->mail->send();
        }
      }catch(Exception $e){

      }
    	$this->mail->ClearAddresses();
    }
  }
  */
}
