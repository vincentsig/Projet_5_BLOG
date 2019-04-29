<h1>S'inscrire</h1>
<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
    <p>Vous n'avez pas rempli le formulaire correctement</p>
    <ul>
        <?php foreach ($errors as $error): ?>
           <li><?=filter_var($error, FILTER_SANITIZE_STRING) ; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<form action="" method="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('email',  'Email'); ?>
    <?= $form->input('password',  'Mot de passe', ['type' => 'password']); ?>
    <?= $form->input('password_confirm','Confirmation du mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Sauvegarder</button> 

</form>
