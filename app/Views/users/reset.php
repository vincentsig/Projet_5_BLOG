
<?php foreach ($flashs as $type => $message): ?>
<div class="alert alert-<?= $type; ?>">
  <ul>
    <li><?=filter_var($message, FILTER_SANITIZE_STRING);?></li>
    </div>
  </ul>
<?php endforeach; ?>

<h1>Réinitialiser mon mot de passe</h1>
<p>Veuillez saisir votre nouveau mot de passe.</p>
<form method="post">
      <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
      <?= $form->input('password_confirm','Confirmation du mot de passe', ['type' => 'password']); ?>
      <button class="btn btn-primary">Envoyer</button> 
    </form>