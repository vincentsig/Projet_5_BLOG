<?php

namespace App\Controller\Admin;

use App;

class IndexController extends AppController
{
    /**
     * dashboard
     * show the managment dashboard
     * @return void
     */
    public function dashboard()
    {
        $this->render('admin.index.dashboard');
    }
}
