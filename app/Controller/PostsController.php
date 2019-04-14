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
        $this->render('posts.blogposts', compact('posts', 'categories'));
    }

    public function categories()
    {
        $category = $this->Category->find($_GET['id']);
        if ($category===false) {
            $this->notFound();
        }
        $posts = $this->Post->lastByCategory($_GET['id']);
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
            $waiting_coms = $this->Comment->waitingValidation($_SESSION['auth']->id, $_GET['id']);
        }
    
        $flashs = Session::getInstance();
        if ($flashs->hasFlashes()) {
            $flashs =$flashs->getFlashes();
        }

        $post = $this->Post->findWithCategory($_GET['id']);
        if ($post ==false) {
            $this->notFound();
        }
        
        if (!empty($_POST) && isset($_POST)) {
            $result = $this->Comment->create([
                'content' => $_POST['content'],
                'date_created' => date('Y-m-d H:i:s'),
                'status' => null,
                'user_id' => $_SESSION['auth']->id,
                'blogpost_id' =>$_GET['id']
            ]);

            $flashs->setFlash('success', 'Votre commentaire sera publié après avoir été validé,
            merci de votre compréhension.');
            return App::redirect('index.php?page=posts.singlepost&id=' . $_GET['id']);
        }
        $comments = $this->Comment->findWithComment($_GET['id']);
        $count = $this->Comment->count($_GET['id']);
        $form = new BootstrapForm($_POST);
        $this->render('posts.singlePost', compact('post', 'user', 'comments', 'count', 'form', 'waiting_coms', 'flashs'));
    }
}
