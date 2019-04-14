
<h1>Gestion des articles<h1>

<p>
    <a href="?page=admin.posts.add" class="btn btn-success">Ajouter un article</a>
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
    <?php foreach ($posts as $post):?>
    <tr>
        <td><?= $post->id; ?></td>
        <td><?= $post->title; ?></td>
        <td>
            <a class="btn btn-primary" href="?page=admin.posts.edit&id=<?= $post->id;?>">Editer</a>

            <form action="?page=admin.posts.delete" method="post" style="display: inline;">

                <input type="hidden" name="id" value="<?= $post->id; ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>    
    </tr>
    <?php endforeach?>
</tbody>
</table>