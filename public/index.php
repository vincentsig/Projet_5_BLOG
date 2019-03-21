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
  require ROOT . '/view/frontend/home.php';
}
elseif ($page === 'posts')
{
    require ROOT . '/view/frontend/posts.php';
}
elseif ($page === 'posts.single')
{
    require ROOT . '/view/frontend/singlePost.php';
}
elseif ($page === 'posts.category')
{
    require ROOT . '/view/frontend/category.php';
}
elseif ($page === 'login')
{
    require ROOT . '/view/users/login.php';
}

$content = ob_get_clean();
require ROOT . '/view/frontend/templates/default.php'; 
 ?>