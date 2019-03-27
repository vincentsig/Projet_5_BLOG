
<h1>Gestion des Commentaires<h1>

<table class="table">
<thead>
    <tr>
        <td>ID</td>
        <td>ID utilisateur</td>
        <td>Actions</td>
    </tr>
</thead>
<tbody>
    <?php foreach($comments as $comment):?>
    <tr>
        <td><?= $comment->id; ?></td>
        <td><?= $comment->user_id; ?></td>
        
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