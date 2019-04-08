<?php

namespace Core\Auth;




class Contact 
{

    public $my_email;

    public function __construct($my_email)
    {

        $this->my_email = $my_email;
        
    }



    public function contact($name, $email_address, $message)
    {
    
        $to = $this->my_email;
        $email_subject = "Formulaire de contact Portefolio:  $name";
        $email_body = "Vous avez reçu un nouveau formulaire de contact .\n\n".
        "Voici le détail des informations:\n\nNom: $name\n\nEmail: $email_address\n\nMessage:\n$message";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: 'vincent.signoret.mail@gmail.com\n"; 
        $headers .= "Reply-To: $email_address";   
        mail($to,$email_subject,$email_body,$headers);
        return true;   
    }



}