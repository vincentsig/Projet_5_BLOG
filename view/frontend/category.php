

<?php 
$app = App::getInstance();


$category = $app->getTable('Category')->find($_GET['id']);
if($category===false)
{
      $app->notFound();
}

$posts = $app->getTable('Post')->lastByCategory($_GET['id']);
$categories = $app->getTable('Category')->all();
?>

<h1><?= $category->title?></h1>