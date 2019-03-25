<form method="post">
    <?= $form->input('title', 'Titre'); ?>
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Categories', $categories);?>
    <button class="btn btn-primary">Sauvegarder</button> 

</form>
