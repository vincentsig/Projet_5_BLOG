<h1>S'inscrire</h1>
<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
    <p>Vous n'avez pas rempli le formulaire correctement</p>
    <ul>
        <?php foreach ($errors as $error): ?>
           <li><?=filter_var($flash, FILTER_SANITIZE_STRING) ; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<form action="" method="post">
    <?= $form->input(filter_var('username', FILTER_SANITIZE_STRING), 'Pseudo'); ?>
    <?= $form->input(filter_var('email', FILTER_SANITIZE_STRING), 'Email'); ?>
    <?= $form->input(filter_var('password', FILTER_SANITIZE_STRING), 'Mot de passe', ['type' => 'password']); ?>
    <?= $form->input(filter_var('password_confirm', FILTER_SANITIZE_STRING), 'Confirmation du mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Sauvegarder</button> 

</form>
