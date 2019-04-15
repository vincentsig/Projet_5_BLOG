<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class AppController extends Controller
{
    protected $template = 'default';
  

    public function __construct()
    {
        $this->viewPath= ROOT . '/app/Views/';
    }

    /**
     * loadModel
     *
     * @param  mixed $model_name
     *  get an object of the table $model_name from de database
     * @return void
     */
    protected function loadModel($model_name)
    {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }
}
