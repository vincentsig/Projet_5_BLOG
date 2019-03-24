<?php
$table = App::getInstance()->getTable('Category');
if(!empty($_POST))
{
    $result = $table->create([
        'title' => $_POST['title'],
    ]);
    
    if($result)
    {
       header('Location: admin.php?page=categories.index');

    }
}
$form = new \Core\HTML\BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('title', 'Titre'); ?>
    <button class="btn btn-primary">Sauvegarder</button> 

</form>
