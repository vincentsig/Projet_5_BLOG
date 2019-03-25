<?php 

use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';

App::load();


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
  require ROOT . '/view/admin/posts/index.php';
}
elseif ($page === 'posts')
{
    require ROOT . '/view/admin/posts/posts.php';
}
elseif ($page === 'posts.single')
{
    require ROOT . '/view/admin/posts/singlePost.php';
}
elseif ($page === 'posts.category')
{
    require ROOT . '/view/admin/posts/category.php';
}
elseif ($page === 'posts.edit')
{
    require ROOT . '/view/admin/posts/edit.php';
}
elseif ($page === 'posts.add')
{
    require ROOT . '/view/admin/posts/add.php';
}
elseif ($page==='posts.delete')
{
    require ROOT . '/view/admin/posts/delete.php';
}
elseif($page==='categories.index') 
{
  require ROOT . '/view/admin/categories/index.php';
}
elseif ($page === 'categories.edit')
{
    require ROOT . '/view/admin/categories/edit.php';
}
elseif ($page === 'categories.add')
{
    require ROOT . '/view/admin/categories/add.php';
}
elseif ($page==='categories.delete')
{
    require ROOT . '/view/admin/categories/delete.php';
}
$content = ob_get_clean();
require ROOT . '/view/frontend/templates/default.php'; 
 ?>