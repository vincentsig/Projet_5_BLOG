<h1>Bonjour <?= $_SESSION['auth']->username; ?></h1>
<?=var_dump($_SESSION['auth']);?>
<?= var_dump($_SESSION['flash']);?>

<?php foreach($flashs as $flash): ?>
           <li><?= $flash; ?></li>
        <?php endforeach; ?>


<form method="post">
<?= $form->input('password', 'Changer de mot de passe', ['type' => 'password']); ?>
<?= $form->input('password_confirm', 'Confirmation du mot de passe', ['type' => 'password']); ?>
<button class="btn btn-primary">Envoyer</button> 
</form>