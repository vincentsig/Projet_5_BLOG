
<div class="container">
   
        <h1 class="section-heading">Gestion des Commentaires</h1>
        

    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
            <h4 class="section-heading">Commentaire en attentes de validation</h4>
        <p>Vous pouvez gérer ici les commentaires. Pour voir les commentaires en attentes de validation cliquez sur le bouton ci dessous.</p>

    </div>
        
        <div class="col-lg-12 col-md-6 mx-auto">
            <a class="btn btn-primary" href="?page=admin.comments.validation">Commentaires en attentes</a>
        </div>

    </div>
</div>
</div>

<div class="container">

    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
        <div class="page-heading">
            <h4 class="section-heading">Liste de tous les commentaires</h4>
        </div>
        <div class="row">
            <div  class="col-lg-9 col-md-10 mx-auto">
            </div>
            <div class="col-lg-3 col-md-10 mx-auto">
                <a class="btn btn-primary" href="?page=admin.index.dashboard">Retour</a>
            </div>  
    </div>
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
        </div>
    </div>
</div>