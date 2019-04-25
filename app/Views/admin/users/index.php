
<?php foreach ($flashs as $type => $message): ?>
<div class="alert alert-<?=filter_var($type, FILTER_SANITIZE_STRING) ; ?>">
    <ul>
        <li><?=filter_var($message, FILTER_SANITIZE_STRING);?></li>
    </ul>
</div> 
<?php endforeach;?>

<h1 class="section-heading">Gestion des Utilisateurs</h1>
<div class="container">
    <div class="row">
            <div  class="col-lg-9 col-md-10 mx-auto">
            </div>
            <div class="col-lg-3 col-md-10 mx-auto">
                <a class="btn btn-primary" href="?page=admin.index.dashboard">Retour</a>
            </div>  
    </div>
</div>

<div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
<table class="table table-dark">
<thead>
    <tr>
        <th scope=>ID</th>
        <th scope=>username</th>
        <th scope=>email</th>
        <th scope=>role</th>
        <th scope=>action</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($users as $user):?>
    <tr>
        <td><?=filter_var($user->id, FILTER_SANITIZE_NUMBER_INT);?></td>
        <td><?= filter_var($user->username, FILTER_SANITIZE_STRING);?></td>
        <td><?= filter_var($user->email, FILTER_SANITIZE_STRING);?></td>
        <td><?=filter_var($user->role_id, FILTER_SANITIZE_NUMBER_INT);?></td>
        <td>
            <a class="btn btn-primary" href="?page=admin.users.edit&id=<?=filter_var($user->id, FILTER_SANITIZE_NUMBER_INT) ;?>">Editer</a>
            <form action="?page=admin.users.delete" method="post" style="display: inline;">

                <input type="hidden" name="id" value="<?=filter_var($user->id, FILTER_SANITIZE_NUMBER_INT) ;?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>      
        </td>    
    </tr>
<?php endforeach;?>
</tbody>
</table>
        </div>
    </div>
</div>