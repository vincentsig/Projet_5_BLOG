<?php
$app = APP::getInstance();
$post = $app->getTable('Post')->findWithCategory($_GET['id']);
if($post ==false)
    $app->notFound();

    $app->title = $post->title;
?>

<h1><?= $post->title;?></h1>

<p><?= $post->content;?></p>;