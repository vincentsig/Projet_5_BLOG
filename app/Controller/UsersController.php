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
                $session = Session::getInstance();
                $session->setFlash('success', 'Un email de confirmation vous a été envoyé pour valider votre compte');
                App::redirect('index.php?page=users.login.php');
            }
           
        }
        $errors = $validator->getErrors();
        $form = new BootstrapForm($_POST);
        $this->render('users.register', compact('form', 'user', 'errors', 'flash', 'validator'));
        

    }



    public function confirm()
    {
        $db = App::getInstance()->getDb();
        

        if(App::getAuth()->confirm($db, $_GET['id'], $_GET['token'], Session::getInstance()))
        {
            Session::getInstance()->setFlash('danger', "Votre compte a bien été validé");
            App::redirect('index.php?page=users.account');
        }
        else{
           $session = Session::getInstance()->setFlash('danger', "Ce token n'est plus valide");
            App::redirect('index.php?page=users.login.php');
        }
        
    }


    public function login()
    {
        $auth = App::getAuth();
        $db = App::getInstance()->getDb();

        if($auth->user())
        {
            App::redirect('users.account');
        }
        if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) 
        {
            $user = $auth->login($db, $_POST['username'], $_POST['password']);
            $session = Session::getInstance();
            if($user)
            {
                $session->setFlash('success', 'Vous êtes maintenant connecté');
                app::redirect('index.php');
            }else
            {
                $session->setFlash('danger', 'Identifiant ou mot de passe incorrecte');
            }
            
        }
        
        $form = new BootstrapForm($_POST);    
        $this->render('users.login', compact('form', 'flash', 'session', 'errors'));
        
    }




    public function account()
    {
        $auth = App::getAuth();
        $auth->restrict();
        if(!empty($_POST))
        {
            if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm'])
            {
                $_SESSION['flash']['danger'] = "Les mots de passes ne correspondent pas";
                }
            else
                {
                $user_id = $_SESSION['auth']->id;
                $password= password_hash($_POST['password'], PASSWORD_BCRYPT);
                $db = App::getInstance()->getDb();
                $auth->update_password($db,$password,$user_id);
                $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
                }           
        }
        $form = new BootstrapForm($_POST);    
        $this->render('users.account', compact('form', 'auth'));
    }


    public function logout()
    {
        App::getAuth()->logout();
        Session::getInstance()->setFlash('success', 'Vous êtes maintenant déconnecté');
        return $this->login();
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