<?php

$post = App\App::getDb()->prepare('SELECT * FROM blogpost WHERE id = ?' , [$_GET['id']], 'App\Entity\Post', true);
?>
<?=App\App::setTitle($post->title);?>
<h1><?= $post->title;?></h1>

<p><?= $post->content;?></p>;