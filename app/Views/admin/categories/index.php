<h1 class="section-heading">Gestion des catégories</h1>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 mx-auto">
            <a href="?page=admin.categories.add" class="btn btn-success">Ajouter une catégorie</a> 
        </div>
        <div class="col-lg-3 col-md-6 mx-auto">
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
    <th scope=>Titre</th>
    <th scope=>Actions</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($items as $category):?>
    <tr>
        <td><?=filter_var($category->id, FILTER_SANITIZE_NUMBER_INT); ?></td>
        <td><?=filter_var($category->title, FILTER_SANITIZE_STRING) ; ?></td>
        <td>
            <a class="btn btn-primary" href="?page=admin.categories.edit&id=<?= filter_var($category->id, FILTER_SANITIZE_NUMBER_INT);?>">Editer</a>

            <form action="?page=admin.categories.delete" method="post" style="display: inline;">

                <input type="hidden" name="id" value="<?=filter_var($category->id, FILTER_SANITIZE_NUMBER_INT); ?>">
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