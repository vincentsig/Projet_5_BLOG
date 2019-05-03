<?php foreach ($flashs as $type => $message): ?>
  <div class="alert alert-<?= $type; ?>">
    <ul>
      <li><?=$message;?></li>
    </ul>
  </div>
<?php endforeach; ?>
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
<h1>Mot de passe oublié</h1>
<p>Veuillez saisir l'adresse email utilisé lors de la création de votre compte.
  Un email vous sera envoyé permettant de réinitialiser votre mot de passe.</p>
<form method="post">
    <?= $form->input(filter_var('email', FILTER_SANITIZE_STRING), 'Email'); ?>
      <button class="btn btn-primary">Réinitialiser votre mot de passe</button>  
</form>
    </div>
  </div>
</div>