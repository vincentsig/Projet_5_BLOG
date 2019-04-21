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

    

    /**
     * register
     * check if the fields form the register form are valid and create the user profil in the database.
     * @return void
     */
    public function register()
    {
        $errors = [];
        $db = App::getInstance()->getDb();
        $validator = new Validator(filter_input_array(INPUT_POST,$_POST, FILTER_SANITIZE_STRING));
        $flashs = Session::getInstance();
        if ($flashs->hasFlashes()) {
            $flashs =$flashs->getFlashes();
        }

        if (!empty($_POST)) {
            $validator->isAlpha('username', "Votre pseudo n'est pas valide (alphanumérique)");
            
            if ($validator->isValid()) {
                $validator->isUniq('username', $db, 'user', 'Ce pseudo est déjà pris');
            }
            $validator->isEmail('email', "Votre email n'est pas valide");

            if ($validator->isValid()) {
                $validator->isUniq('email', $db, 'user', 'Cet email est déjà utilisé pour un autre compte');
            }
            $validator->isConfirmed('password', 'Vous devez rentrer un mot de passe valide');
            
            if ($validator->isValid()) {
                $auth = new Auth($db, Session::getInstance());
                $auth->register($db,filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                                     filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS), 
                                     filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $flashs->setFlash('success', 'Un email de confirmation vous a été envoyé pour valider votre compte');
                App::redirect('index.php?page=users.login.php');
            }
        }
       
        $errors = $validator->getErrors();
        $form = new BootstrapForm(filter_input(INPUT_POST, '$_POST', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $this->render('users.register', compact('form',  'flashs', 'errors', 'validator'));
    }

    /**
     * confirm
     * get the validation token sent by email during the registering
     * @return void
     */
    public function confirm()
    {
        $db = App::getInstance()->getDb();
        $flashs = Session::getInstance();

        if (App::getAuth()->confirm($db, filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT),
                                         filter_input(INPUT_GET, 'token', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                                          Session::getInstance())) {
            $flashs->setFlash('success', "Votre compte a bien été validé");
            App::redirect('index.php?page=users.account');
        } else {
            $flashs->setFlash('danger', "Ce token n'est plus valide");
            App::redirect('index.php?page=users.login.php');
        }
    }


    /**
     * login
     * log the user if the username and password are valid.
     * @return void
     */
    public function login()
    {
        $db = App::getInstance()->getDb();
        $auth = App::getAuth($db, Session::getInstance());
        $flashs = Session::getInstance();
        if ($flashs->hasFlashes()) {
            $flashs =$flashs->getFlashes();
        }
        if ($auth->logged()) {
            App::redirect('index.php?page=users.account');
        }
        if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
            $user = $auth->login($db, filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                                    filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            if ($user) {
                $flashs->setFlash('success', 'Vous êtes maintenant connecté');
                App::redirect('index.php');
            } else {
                $flashs->setFlash('danger', 'Identifiant ou mot de passe incorrecte');
                App::redirect('index.php?page=users.login');
            }
        }
      

        $form = new BootstrapForm(filter_input(INPUT_POST, '$_POST', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $this->render('users.login', compact('form', 'flashs'));
    }


    
    /**
     * account
     * go to the account page where the user have the possibility to change his password.
     * @return void
     */
    public function account()
    {
        $auth = App::getAuth();
        $auth->restrict();
        $flashs = Session::getInstance();
        if (!empty($_POST))  {
            if (empty($_POST['password'])
                 || filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS)
                  != filter_input(INPUT_POST, 'password_confirm', FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
                $flashs->setFlash('danger', 'Les mots de passes ne correspondent pas');
            } else {
                $user_id = $_SESSION['auth']->id;
                $password= password_hash(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS), PASSWORD_BCRYPT);
                $db = App::getInstance()->getDb();
                $auth->update_password($db, $password, $user_id);
                $flashs->setFlash('success', 'Votre mot de passe a bien été mis à jour');
            }
            App::redirect('index.php?page=users.account');
        }
        if ($flashs->hasFlashes()) {
            $flashs =$flashs->getFlashes();
        }
        $form = new BootstrapForm(filter_input(INPUT_POST, '$_POST', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $this->render('users.account', compact('form', 'auth', 'flashs'));
    }


    /**
     * logout
     * logout the user and redirect the user on the login page.
     * @return void
     */
    public function logout()
    {
        
        App::getAuth()->logout();
        Session::getInstance()->setFlash('success', 'Vous êtes maintenant déconnecté');
        return App::redirect('index.php?page=users.login');
    }
}
