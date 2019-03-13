<?php 
require '../app/Autoloader.php';
App\Autoloader::register();




if(isset($_GET['p'])) 
{
    $p = $_GET['p'];
}
else 
{
    $p ='home';
}


ob_start();
if($p==='home') 
{
  require '../src/view/frontend/home.php';
}
elseif ($p === 'posts')
{
    require '../src/view/frontend/posts.php';
}
elseif ($p === 'singlePost')
{
    require '../src/view/frontend/singlePost.php';
}
elseif ($p === 'category')
{
    require '../src/view/frontend/category.php';
}
$content = ob_get_clean();
require '../src/view/frontend/templates/default.php';
