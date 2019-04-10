
<h1>Gestion des Commentaires<h1>

<p>Vous pouvez gérer ici les commentaires. Pour voir les commentaires en attentes de validation cliquez sur le bouton ci dessous.</p>
<a class="btn btn-primary" href="?page=admin.comments.validation">Commentaires en attentes</a>
<table class="table table-dark">

<thead>
    <tr>
    <th scope=>ID</th>
    <th scope=>>ID utilisateur</th>
    <th scope=>Status</th>
    <th scope=>Actions</th>
    </tr>
</thead>
<tbody>
    <?php foreach($comments as $comment):?>
    <tr>
        <td><?= $comment->id; ?></td>
        <td><?= $comment->user_id; ?></td>
        <td><?= $comment->status; ?></td>
        <td> 
            <form action="?page=admin.comments.delete" method="post" style="display: inline;">
                <input type="hidden" name="id" value="<?= $comment->id; ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>    
    </tr>
    <?php endforeach?>
</tbody>
</table>