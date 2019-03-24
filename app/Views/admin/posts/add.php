<?php
$postTable = App::getInstance()->getTable('Post');
if(!empty($_POST))
{
    $result = $postTable->create([
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'category_id' => $_POST['category_id']
    ]);
    
    if($result)
    {
       header('Location: admin.php?page=posts.edit&id=' . App::getInstance()->getDb()->lastInsertId()); 

    }
}



$categories = APP::getInstance()->getTable('Category')->getList('id', 'title');
$form = new \Core\HTML\BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('title', 'Titre'); ?>
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Categories', $categories);?>
    <button class="btn btn-primary">Sauvegarder</button> 

</form>
