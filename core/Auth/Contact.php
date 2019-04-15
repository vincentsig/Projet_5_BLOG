<?php

namespace Core\Auth;

use App;




class Contact 
{

    protected $my_email;

    public function __construct()
    {
        $this->my_email= App::getInstance()->getEmail();
        
    }



    public function contact($firstname , $surname, $email_address, $message)
    {
    
        $to = $email_address;
        $email_subject = "Formulaire de contact Portefolio:  $firstname-$surname";
        $email_body = "Vous avez reçu un nouveau formulaire de contact .\n\n".
        "Voici le détail des informations:\n\nNom:  $firstname-$surname\n\nEmail: $email_address\n\nMessage:\n$message";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: $this->my_email\n"; 
        $headers .= "Reply-To: $email_address";   
        mail($to,$email_subject,$email_body,$headers);
        return true;   
    }



}