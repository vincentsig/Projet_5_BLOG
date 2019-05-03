<?php

namespace App\Controller;

use App;
use \Core\Auth\Session;
use \Core\Auth\Validator;
use \Core\Auth\Contact;
use Core\HTML\BootstrapForm;
use Core\Auth\Auth;

class PostsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comment');
        $this->loadModel('User');
    }


    /**
     * blogpost
     * show all the blogposts order by last date
     * @return void
     */
    public function blogpost()
    {
        $db = App::getInstance()->getDb();
        $auth = new Auth($db, Session::getInstance());
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('posts.blogposts', compact('posts', 'categories','auth'));
    }

    public function categories()
    {
        $category = $this->Category->find(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        if ($category===false) {
            $this->notFound();
        }
        $posts = $this->Post->lastByCategory(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        $categories = $this->Category->all();
        $this->render('posts.category', compact('posts', 'categories', 'category'));
    }

    /**
     * singlePost
     * Show all the details of a singlepost with the possibility to add some new comments
     * @return void
     */
    public function singlePost()
    {
        $db = App::getInstance()->getDb();
        $auth = new Auth($db, Session::getInstance());
        $waiting_coms = [];
        if ($auth->logged()) {
            $waiting_coms = $this->Comment->waitingValidation($_SESSION['auth']->id, filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        }
      
        $flashs = Session::getInstance();
        if ($flashs->hasFlashes()) {
            $flashs =$flashs->getFlashes();
        }

        $post = $this->Post->findWithCategory(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        if ($post ==false) {
            $this->notFound();
        }
        
        if (!empty($_POST) && isset($_POST)) {
            $this->Comment->create([
                'content' =>  filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'date_created' => date('Y-m-d H:i:s'),
                'status' => null,
                'user_id' => $_SESSION['auth']->id,
                'blogpost_id' =>filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)
            ]);

            $flashs->setFlash('success', 'Votre commentaire sera publié après avoir été validé,
            merci de votre compréhension.');
            return App::redirect('index.php?page=posts.singlepost&id=' . filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        }
        $comments = $this->Comment->findWithComment(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        $count = $this->Comment->count(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        $form = new BootstrapForm(filter_input(INPUT_POST, '$_POST', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $this->render('posts.singlePost', compact('post', 'comments', 'count', 'form', 'waiting_coms', 'flashs'));
    }
}
