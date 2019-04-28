
<?php foreach ($flashs as $type => $message): ?>
<div class="alert alert-<?= $type; ?>">
  <ul>
    <li><?=filter_var($message, FILTER_SANITIZE_STRING);?></li>
    </div>
  </ul>
<?php endforeach; ?>


<form method="post">
    <?= $form->input(filter_var('username', FILTER_SANITIZE_STRING), 'Pseudo'); ?>
    <?= $form->input(filter_var('password', FILTER_SANITIZE_STRING), 'Mot de passe 
    <a href="index.php?page=users.forget.php"><FONT size="2">(J\'ai oublié mon mot de passe)</FONT> </a>', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button> 

</form>