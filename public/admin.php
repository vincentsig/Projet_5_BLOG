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
  require ROOT . '/view/backend/index.php';
}
elseif ($page === 'posts')
{
    require ROOT . '/view/backend/posts.php';
}
elseif ($page === 'posts.single')
{
    require ROOT . '/view/backend/singlePost.php';
}
elseif ($page === 'posts.category')
{
    require ROOT . '/view/backend/category.php';
}
$content = ob_get_clean();
require ROOT . '/view/frontend/templates/default.php'; 
 ?>