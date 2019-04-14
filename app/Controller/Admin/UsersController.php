<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

class UsersController extends AppController
{
    public function __construct()
    {
        parent:: __construct();
        $this->loadModel('User');
        $this->loadModel('Role');
    }


    public function index()
    {
        $users = $this->User->all();
        $this->render('admin.users.index', compact('users'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->User->update($_GET['id'], [
                'role_id' => $_POST['role_id']
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $user = $this->User->find($_GET['id']);
        $roles = $this->Role->getList('id', 'name');
        $form = new BootstrapForm($user);
        $this->render('admin.users.edit', compact('roles', 'form', 'user'));
    }



    public function delete()
    {
        if (!empty($_POST)) {
            $this->User->delete($_POST['id']);
            {
                return $this->index();
            }
        }
    }
}
