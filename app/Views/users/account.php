<h1>Bonjour <?= $_SESSION['auth']->username; ?></h1>
<?=var_dump($_SESSION['auth']);?>
<?= var_dump($_SESSION['flash']);?>

<?= var_dump($_POST);?>
<?= var_dump($_SESSION['flash']);?>


<form method="post">
<?= $form->input('password', 'Changer de mot de passe', ['type' => 'password']); ?>
<?= $form->input('password_confirm', 'Confirmation du mot de passe', ['type' => 'password']); ?>
<button class="btn btn-primary">Envoyer</button> 
</form>