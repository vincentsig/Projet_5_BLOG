<?php
$postTable = App::getInstance()->getTable('Post');
if(!empty($_POST))
{
    $result = $postTable->update($_GET['id'],[
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'category_id' => $_POST['category_id']
    ]);
    if($result)
    {
        ?>
            <div class="alert alert-success"> L'article à bien été mis à jour.</div>
        <?php

    }
}


$post = $postTable->find($_GET['id']);
$categories = APP::getInstance()->getTable('Category')->getList('id', 'title');
$form = new \Core\HTML\BootstrapForm($post);
?>

<form method="post">
    <?= $form->input('title', 'Titre'); ?>
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Categories', $categories);?>
    <button class="btn btn-primary">Sauvegarder</button> 

</form>
