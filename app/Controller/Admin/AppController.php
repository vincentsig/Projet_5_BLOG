<?php

namespace App\Controller\Admin;

use \App;
use \Core\Auth\Auth;
use \Core\Auth\Session;

class AppController extends \App\Controller\AppController
{
    public function __construct()
    {
        parent::__construct();
        $db = App::getInstance()->getDb();
        $auth = new Auth($db, Session::getInstance());
        $auth = $auth->getRole();
        if ($auth !=1) {
            $this->forbidden();
        }
    }
}
