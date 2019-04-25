<?php

namespace App\Controller;
use App;
use \Core\Auth\Session;
use \Core\Auth\Validator;
use \Core\Auth\Contact;
use \Core\HTML\BootstrapForm;


class HomeController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comment');
        $this->loadModel('User');
    }



    /**
     * index
     * show the preview of the last four blogpost
     * send a contact form if there is data in $_POST and if all the fields are valids.
     * @return void
     */
    public function index()
    {
        $errors = [];
        $posts = $this->Post->lastFourPosts();
        $categories = $this->Category->all();
        $flashs = Session::getInstance();
        $validator = new Validator(filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));
        $contact = new Contact(App::getInstance()->getEmail());
        if($flashs->hasFlashes())
        {
            $flashs =$flashs->getFlashes();
        }
         if(!empty($_POST))
        {
            $validator->isAlpha('firstname', "Votre Prénom n'est pas valide (alphanumérique)");
            $validator->isAlpha('surname', "Votre nom n'est pas valide (alphanumérique)");
            $validator->isEmail('email', "Votre email n'est pas valide");
            if($validator->isValid())
            {
            
                $contact->contact( filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL), filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $flashs->setFlash('success', 'Votre email de contact à bien été envoyé');
                App::redirect('index.php?page=home.index.php');
            }
            
        }
        
        $errors = $validator->getErrors();
        $form = new BootstrapForm(filter_input(INPUT_POST, '$_POST', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $this->render('home.index',compact('posts', 'categories', 'flashs', 'form','errors', 'contact'));
    }

    
}