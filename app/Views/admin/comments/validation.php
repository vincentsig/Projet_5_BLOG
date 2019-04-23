<?php foreach ($flashs as $type => $message): ?>
<div class="alert alert-<?= $type; ?>">
  <ul>
    <li><?=$message;?></li>
    </div>
  </ul>
<?php endforeach; ?>


<table class="table table-dark">
<h4>Voici la listes des commentaires en attentes de validation</h4>
<div class="row">
            <div  class="col-lg-9 col-md-10 mx-auto">
            </div>
            <div class="col-lg-3 col-md-10 mx-auto">
                <a class="btn btn-primary" href="?page=admin.comments.index">Retour</a>
            </div>  
    </div> 
<thead>
    <tr>
    <th scope="col">ID</th>
    <th scope="col">Contenu</th>
    <th scope="col">Actions</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($comments as $comment):?>
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