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



    public function index()
    {
        $errors = [];
        $posts = $this->Post->lastFourPosts();
        $categories = $this->Category->all();
        $flashs = Session::getInstance();
        $validator = new Validator($_POST);
        $contact = new Contact(App::getInstance()->getEmail());
        if($flashs->hasFlashes())
        {
            $flashs =$flashs->getFlashes();
        }
         if(!empty($_POST))
         {
            $validator->isAlpha('name', "Votre pseudo n'est pas valide (alphanumérique)");
            $validator->isEmail('email', "Votre email n'est pas valide");
            if($validator->isValid())
            {
            
                //$contact->contact($_POST['name'], $_POST['email'], $_POST['message']);
                $flashs->setFlash('success', 'Votre email de contact à bien été envoyé');
                App::redirect('index.php');
            }
         }
        $errors = $validator->getErrors();
        $form = new BootstrapForm($_POST);
        $this->render('posts.index',compact('posts', 'categories', 'flashs', 'form','errors', 'contact'));
    }



    public function blogpost()
    {
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('posts.blogposts',compact('posts', 'categories'));
    }

    public function categories()
    {
        $category = $this->Category->find($_GET['id']);
        if($category===false)
        {
            $this->notFound();
        }
        $posts = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('posts', 'categories','category'));
    }

    public function singlePost()
    {
        $db = App::getInstance()->getDb();
        $auth = new Auth($db, Session::getInstance());
            if ($auth->logged())
            {
                $waiting_coms = $this->Comment->waitingValidation($_SESSION['auth']->id, $_GET['id']);

            }
            else 
            {
                $waiting_coms = [];
            }

        $flashs = Session::getInstance();
        if($flashs->hasFlashes())
        {
            $flashs =$flashs->getFlashes();
        }

        $post = $this->Post->findWithCategory($_GET['id']);
        if($post ==false)
        {
            $this->notFound();
        }
        
         if(!empty($_POST) && isset($_POST))
        {
            $result = $this->Comment->create([
                'content' => $_POST['content'],
                'date_created' => date('Y-m-d H:i:s'),
                'status' => NULL,
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
        $this->render('posts.singlePost', compact('post','user','comments','count','form', 'waiting_coms', 'flashs'));

    }
    
}