<h1>Gestion des catégories<h1>

<p>
    <a href="?page=admin.categories.add" class="btn btn-success">Ajouter une catégorie</a>
</p>

<table class="table">
<thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>
</thead>
<tbody>
    <?php foreach($items as $category):?>
    <tr>
        <td><?= $category->id; ?></td>
        <td><?= $category->title; ?></td>
        <td>
            <a class="btn btn-primary" href="?page=admin.categories.edit&id=<?= $category->id;?>">Editer</a>

            <form action="?page=admin.categories.delete" method="post" style="display: inline;">

                <input type="hidden" name="id" value="<?= $category->id; ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>    
    </tr>
    <?php endforeach?>
</tbody>
</table>