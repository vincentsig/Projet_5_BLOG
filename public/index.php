<?php 
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';

App::load();

$app = App::getInstance();

$posts = $app->getTable('Post');




if(isset($_GET['page'])) 
{
    $page = $_GET['page'];
}
else 
{
    $page ='home';
}

ob_start();
if($page==='home') 
{
    $controller = new \App\Controller\PostController;
    $controller->index();
}
elseif ($page === 'posts.singlePost')
{
    $controller = new \App\Controller\PostController;
    $controller->show();
}
elseif ($page === 'posts.category')
{
    $controller = new \App\Controller\PostController;
    $controller->category();
}
elseif ($page === 'login')
{
    $controller = new \App\Controller\UsersController;
    $controller->login();
}

 ?>