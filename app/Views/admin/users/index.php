

<?= var_dump($session_id);?>
<?= var_dump($_SESSION['auth']);?>

<?php foreach ($flashs as $type => $message): ?>
<div class="alert alert-<?= $type; ?>">
  <ul>
    <li><?=$message;?></li>
    </div>
  </ul>
<?php endforeach; ?>

<div class="container">
    <h1 class="section-heading">Gestion des Utilisateurs</h1>
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
<table class="table table-dark">
<thead>
    <tr>
        <th scope=>ID</td>
        <th scope=>username</td>
        <th scope=>email</td>
        <th scope=>role</td>
        <th scope=>action</td>
    </tr>
</thead>
<tbody>
    <?php foreach ($users as $user):?>
    <tr>
        <td><?= $user->id; ?></td>
        <td><?= $user->username; ?></td>
        <td><?= $user->email; ?></td>
        <td><?= $user->role_id; ?></td>
        <td>
            <a class="btn btn-primary" href="?page=admin.users.edit&id=<?= $user->id;?>">Editer</a>
            <form action="?page=admin.users.delete" method="post" style="display: inline;">

                <input type="hidden" name="id" value="<?= $user->id; ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>      
        </td>    
    </tr>
    <?php endforeach?>
</tbody>
</table>
        </div>
    </div>
</div>