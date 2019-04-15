<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

class CategoriesController extends AppController
{
    public function __construct()
    {
        parent:: __construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }


    /**
     * index
     * index of the categories managment
     * @return void
     */
    public function index()
    {
        $items = $this->Category->all();
        $this->render('admin.categories.index', compact('items'));
    }
   

    /**
     * add
     * add a new category
     * @return void
     */
    public function add()
    {
        if (!empty($_POST)) {
            $result = $this->Category-> create([
                'title' => $_POST['title']]);
            
            return $this->index();
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.categories.edit', compact('form'));
    }


    /**
     * edit
     * rename a category
     * @return void
     */
    public function edit()
    {
        if (!empty($_POST)) {
            $this->Post->update($_GET['id'], [
                'title' => $_POST['title'],
            ]);
            return $this->index();
        }
        $category = $this->Category->find($_GET['id']);
        $form = new BootstrapForm($category);
        $this->render('admin.categories.edit', compact('form'));
    }
    

    /**
     * delete
     * delete a category
     * @return void
     */
    public function delete()
    {
        if (!empty($_POST)) {
            $this->Category->delete($_POST['id']);
            {
                return $this->index();
            }
        }
    }
}
