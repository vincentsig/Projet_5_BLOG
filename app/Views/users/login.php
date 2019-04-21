
<?php foreach ($flashs as $type => $message): ?>
<div class="alert alert-<?= $type; ?>">
  <ul>
    <li><?=$message;?></li>
    </div>
  </ul>
<?php endforeach; ?>


<form method="post">
    <?= $form->input(filter_var('username', FILTER_SANITIZE_STRING), 'Pseudo'); ?>
    <?= $form->input(filter_var('password', FILTER_SANITIZE_STRING), 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button> 

</form>