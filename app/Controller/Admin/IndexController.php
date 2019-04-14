<?php

namespace App\Controller\Admin;

use App;

class IndexController extends AppController
{
    public function dashboard()
    {
        $this->render('admin.index.dashboard');
    }
}
