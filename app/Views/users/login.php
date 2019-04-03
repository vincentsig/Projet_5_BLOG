<?php 
if($errors): ?>
<div class="class=alert alert-danger">
    Identifiants incorrects
</div>
<?php endif;?>



<?= var_dump($session);?>
<?= var_dump($_POST);?>
<?= var_dump($_SESSION['flash']);?>
<?= var_dump($_SESSION['auth']);?>
<form method="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button> 

</form>