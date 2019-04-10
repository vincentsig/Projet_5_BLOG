<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
<form method="post">
    <?= $form->input('title', 'Titre'); ?>
    <?= $form->input('lead_in', "Chapo de l'article", ['type' => 'textarea']); ?>
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Categories', $categories);?>
    <button class="btn btn-primary">Sauvegarder</button> 

</form>
</div>
</div>
</div>