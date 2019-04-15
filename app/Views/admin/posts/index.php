<div class="container">
    <h1 class="section-heading">Gestion des Articles</h1>
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">

<p>
    <a href="?page=admin.posts.add" class="btn btn-success">Ajouter un article</a>
</p>


<div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
<table class="table table-dark">
<thead>
    <tr>
        <th scope=>ID</td>
        <th scope=>Titre</td>
        <th scope=>Actions</td>
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
        </div>
    </div>
</div>