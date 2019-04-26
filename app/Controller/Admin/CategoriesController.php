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
            $this->Category-> create([
                'title' =>filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS)]);
            
            return $this->index();
        }
        $form = new BootstrapForm(filter_input_array(INPUT_POST, $_POST, FILTER_SANITIZE_STRING));
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
            $this->Post->update(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT), [
                'title' => filter_input_array(INPUT_POST, 'title', FILTER_SANITIZE_STRING),
            ]);
            return $this->index();
        }
        $category = $this->Category->findfilter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
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
            $this->Category->delete(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT));
            {
                return $this->index();
            }
        }
    }
}
