
<h1>Gestion des Utilisateurs<h1>



<table class="table">
<thead>
    <tr>
        <td>ID</td>
        <td>username</td>
        <td>email</td>
        <td>role</td>
        <td>action</td>
    </tr>
</thead>
<tbody>
    <?php foreach($users as $user):?>
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