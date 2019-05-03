<h1>Mon Compte </h1>

<?php foreach ($flashs as $type => $message): ?>
  <div class="alert alert-<?= $type; ?>">
    <ul>
      <li><?=filter_var($message, FILTER_SANITIZE_STRING);?></li>
    </ul>
  </div>
<?php endforeach; ?>
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
        <p>Bonjour <?= $_SESSION['auth']->username; ?></p>
        <p>Bienvenue sur votre page d'utilisateur, si vous le désirez vous pouvez changer votre mot de passe en complétant les champs ci-dessous.</p>
    </div>
  </div>
    <form method="post">
      <?= $form->input('password', 'Changer de mot de passe', ['type' => 'password']); ?>
      <?= $form->input('password_confirm', 'Confirmation du mot de passe', ['type' => 'password']); ?>
      <button class="btn btn-primary">Envoyer</button> 
    </form>
</div>