<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;
use \Core\Auth\Session;
use App;

class UsersController extends AppController
{
    public function __construct()
    {
        parent:: __construct();
        $this->loadModel('User');
        $this->loadModel('Role');
    }


    /**
     * index
     * index of the user managment
     * @return void
     */
    public function index()
    {
        $users = $this->User->all();
        $db = App::getInstance()->getDb();
        $auth = App::getAuth($db, Session::getInstance());
        $flashs = Session::getInstance();
        if ($flashs->hasFlashes()) {
            $flashs =$flashs->getFlashes();
        }
        $session_id = $auth->getUserId();
        $this->render('admin.users.index', compact('users', 'session_id', 'auth', 'flashs'));
    }

    /**
     * edit
     * edit the user table
     * @return void
     */
    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->User->update(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT), [
                'role_id' => filter_input(INPUT_POST, 'role_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS)
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $user = $this->User->find(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        $roles = $this->Role->getList('id', 'name');
        $form = new BootstrapForm($user);
        $this->render('admin.users.edit', compact('roles', 'form', 'user'));
    }



    /**
     * delete
     * delete a user but you can't delete your own account during the session
     * @return void
     */
    public function delete()
    {
        if (!empty($_POST)) {
            $db = App::getInstance()->getDb();
            $auth = App::getAuth($db, Session::getInstance());
            $flashs = Session::getInstance();
            $session_id = $auth->getUserId();
            if (filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT) === $session_id) {
                $flashs->setFlash('danger', "Vous ne pouvez pas supprimer votre propre compte");
                return App::redirect('index.php?page=admin.users.index');
            }
            $this->User->delete(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT));
            return $this->index();
        }
    }
}
