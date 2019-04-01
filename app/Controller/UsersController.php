<?php

namespace App\Controller;
use \Core\HTML\BootstrapForm;
use \Core\Auth\Auth;
use \Core\Auth\Validator;
use\App;

class UsersController extends AppController
{
     

    public function __construct()
        {
            parent::__construct();
            $this->loadModel('User');
        }

    


    public function register()
    {
        
        if(!empty($_POST))
        { 
            $errors = [];
            $db = App::getInstance()->getDb();

            $validator = new Validator($_POST);
            
            $validator->isAlpha('username', "Votre pseudo n'est pas valide (alphanumérique)");
            
            if($validator->isValid())
            {
                $validator->isUniq('username', $db,'user', 'Ce pseudo est déjà pris');
            }
            $validator->isEmail('email', "Votre email n'est pas valide");

            if($validator->isValid())
            {
                $validator->isUniq('email', $db, 'user', 'Cet email est déjà utilisé pour un autre compte');
            }

            if($validator->isValid())
            {
                $user = $this->User->registerUser($_POST['username'], $_POST['password'], $_POST['email']);
                header('Location: index.php');
            }
        
        }
        $errors = $validator->getErrors();
        $form = new BootstrapForm($_POST);
        $this->render('users.register', compact('form', 'user', 'errors', 'validator'));
        

    }


    public function login()
    { 
        $errors = false;
    if(!empty($_POST))
    {
        $auth = new Auth(App::getInstance()->getDb());
        if($auth->login($_POST['username'], $_POST['password']))
            {
            header('Location: index.php?page=admin.posts.index');
            }
        else
        {
            $errors = true;
            
        }
    }
    $form = new BootstrapForm($_POST);
    $this->render('users.login', compact('form', 'errors'));
    }
}