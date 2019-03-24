<?php
$table = App::getInstance()->getTable('Category');
if(!empty($_POST))
{
    $result = $table->update($_GET['id'],[
        'title' => $_POST['title'],
    ]);
    if($result)
    {
        ?>
            <div class="alert alert-success"> La catégorie à bien été mis à jour.</div>
        <?php

    }
}


$category = $table->find($_GET['id']);

$form = new \Core\HTML\BootstrapForm($category);
?>

<form method="post">
    <?= $form->input('title', 'Titre'); ?>
    <button class="btn btn-primary">Sauvegarder</button> 

</form>
