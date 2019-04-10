<table class="table table-dark">

<h4>Voici la listes des commentaires en attentes de validation</h4>

<thead>
    <tr>
    <th scope="col">ID</th>
    <th scope="col">Contenu</th>
    <th scope="col">Actions</th>
    </tr>
</thead>
<tbody>
    <?=var_dump($comments)?>
    <?php foreach($comments as $comment):?>
    <tr>
        <td><?=  $comment->id; ?></td>
        <td><?=  $comment->content;?></td>
        <td>
            <form action="?page=admin.comments.valid" method="post" style="display: inline;">
            <input type="hidden" name="id" value="<?= $comment->comment_id; ?>">
            <button type="submit" class="btn btn-primary">Valider</button>
            </form>
            <form action="?page=admin.comments.delete" method="post" style="display: inline;">
            <input type="hidden" name="id" value="<?= $comment->comment_id; ?>">
            <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>

        </td>    
    </tr>
    <?php endforeach?>
</tbody>
</table>