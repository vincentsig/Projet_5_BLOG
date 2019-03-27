<form method="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('email', 'Email'); ?>
    <?= $form->input('email', 'Confirmation Email'); ?>
    <?= $form->input('password', 'Mot de passe'); ?>
    <?= $form->input('password', 'Confirmation du mot de passe'); ?>
    <button class="btn btn-primary">Sauvegarder</button> 

</form>