<?php 
$posts = App::getInstance()->getTable('Post')->all();
?>


<h1>Gestion des articles<h1>
<table class="table">
<thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>
</thead>
<tbody>
    <?php foreach($posts as $post):?>
    <tr>
        <td><?= $post->id; ?></td>
        <td><?= $post->title; ?></td>
        <td><a class="btn btn-primary" href="?page=posts.edit&id=<?= $post->id;?>">Editer</a></td>
    </tr>
    <?php endforeach?>
</tbody>
</table>