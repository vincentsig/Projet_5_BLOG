<?php

namespace App\Controller;
use \Core\HTML\BootstrapForm;
use \Core\Auth\Auth;
use \Core\Auth\Validator;
use \Core\Auth\Session;
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
        $errors = [];
        $db = App::getInstance()->getDb();
        $validator = new Validator($_POST);

        if(!empty($_POST))
        { 
                    
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
            $validator->isConfirmed('password', 'Vous devez rentrer un mot de passe valide');
            
            if($validator->isValid())
            {
                $auth = new Auth($db, Session::getInstance());
                $auth->register($db,$_POST['username'], $_POST['password'], $_POST['email']);
                Session::getInstance()->setFlash('success', 'Un email de confirmation vous a été envoyé pour valider votre compte');
                App::redirect('index.php?page=users.login.php');
            }
        
        }
        $errors = $validator->getErrors();
        $form = new BootstrapForm($_POST);
        $this->render('users.register', compact('form', 'user', 'errors', 'validator'));
        

    }



    public function login()
    {
        $auth = App::getAuth();
        $db = App::getInstance()->getDb();
        if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) 
        {
            $user = $auth->login($db, $_POST['username'], $_POST['password']);
            $session = Session::getInstance();
            if($user)
            {
                $session->setFlash('success', 'Vous êtes maintenant connecté');
                App::redirect('index.php');
            }else
            {
                $session->setFlash('danger', 'Identifiant ou mot de passe incorrecte');
            }
        }
        $form = new BootstrapForm($_POST);    
        $this->render('users.login', compact('form', 'session', 'errors', ''));
        
    }



    public function confirm()
    {
        $db = App::getInstance()->getDb();
        

        if(App::getAuth()->confirm($db, $_GET['id'], $_GET['token'], Session::getInstance()))
        {
            Session::getInstance()->setFlash('danger', "Votre compte a bien été validé");

        }
        else{
            Session::getInstance()->setFlash('danger', "Ce token n'est plus valide");
            App::redirect('index.php?page=users.login.php');
        }

    }


    /*public function login()
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
    }*/
}