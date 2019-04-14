<h1>Bonjour <?= $_SESSION['auth']->username; ?></h1>

<?php foreach ($flashs as $type => $message): ?>
<div class="alert alert-<?= $type; ?>">
  <ul>
    <li><?=$message;?></li>
    </div>
  </ul>
<?php endforeach; ?>


<form method="post">
<?= $form->input('password', 'Changer de mot de passe', ['type' => 'password']); ?>
<?= $form->input('password_confirm', 'Confirmation du mot de passe', ['type' => 'password']); ?>
<button class="btn btn-primary">Envoyer</button> 
</form>