
<h1>Gestion des Commentaires</h1>
<br>
<div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
        <div class="page-heading">
            <h4>Commentaire en attentes de validation</h4>
        <p>Vous pouvez gérer ici les commentaires. Pour voir les commentaires en attentes de validation cliquez sur le bouton ci dessous.</p>
        <p><a class="btn btn-primary" href="?page=admin.comments.validation">Commentaires en attentes</a></p>
        </div>
     </div>
    </div>
</div>



<h4>Liste de tous les commentaires</h4>
<table class="table table-dark">
<thead>
    <tr>
    <th scope="col">ID</th>
    <th scope="col">ID utilisateur</th>
    <th scope="col">Status</th>
    <th scope="col">Actions</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($comments as $comment):?>
    <tr>
        <td><?=filter_var($comment->id, FILTER_SANITIZE_NUMBER_INT) ; ?></td>
        <td><?=filter_var($comment->user_id, FILTER_SANITIZE_NUMBER_INT) ; ?></td>
        <td><?=filter_var($comment->content, FILTER_SANITIZE_STRING) ; ?></td>
        <td> 
            <form action="?page=admin.comments.delete" method="post" style="display: inline;">
                <input type="hidden" name="id" value="<?=filter_var($comment->id, FILTER_SANITIZE_NUMBER_INT); ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>    
    </tr>
    <?php endforeach?>
</tbody>
</table>