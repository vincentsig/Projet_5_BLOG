<?php
$postTable = App::getInstance()->getTable('Post');
if(!empty($_POST))
{
    $result = $postTable->update($_GET['id'],[
        'title' => $_POST['title'],
        'content' => $_POST['content']
    ]);
    if($result)
    {
        ?>
            <div class="alert alert-success"> L'article à bien été mis à jour.</div>
        <?php

    }
}


 $post = $postTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($post);
?>

<form method="post">
    <?= $form->input('title', 'Titre'); ?>
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
    <button class="btn btn-primary">Sauvegarder</button> 

</form>
