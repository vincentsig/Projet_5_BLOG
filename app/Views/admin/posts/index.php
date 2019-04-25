<?php foreach ($flashs as $flash): ?>
<div class="alert alert-info">
<ul>
    <li><?=filter_var($flash, FILTER_SANITIZE_STRING); ?></li>
</ul>
</div>
<?php endforeach?>

<div class="container">
    <h1 class="section-heading">Gestion des Articles</h1>
    <div class="row">
      <div class="col-lg-4 col-md-6 mx-auto">

<p>
    <a href="?page=admin.posts.add" class="btn btn-success">Ajouter un article</a>
</p>
</div>
<div class="col-lg-4 col-md-6 mx-auto">

<p>
    <a href="?page=admin.posts.archived" class="btn btn-success">Voir les articles archivés</a>
</p>
</div>
</div>
<div class="row">
            <div  class="col-lg-9 col-md-10 mx-auto">
            </div>
            <div class="col-lg-3 col-md-10 mx-auto">
                <a class="btn btn-primary" href="?page=admin.index.dashboard">Retour</a>
            </div>  
    </div>
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
        <td><?=filter_var($post->id, FILTER_SANITIZE_NUMBER_INT) ; ?></td>
        <td><?=filter_var($post->title, FILTER_SANITIZE_STRING) ; ?></td>
        <td>
            <a class="btn btn-primary" href="?page=admin.posts.edit&id=<?= filter_var($post->id, FILTER_SANITIZE_NUMBER_INT);?>">Editer</a>

            <form action="?page=admin.posts.erase" method="post" style="display: inline;">

                <input type="hidden" name="id" value="<?=filter_var($post->id, FILTER_SANITIZE_NUMBER_INT); ?>">
                <button type="submit" class="btn btn-danger">Archiver</button>
            </form>
        </td>    
    </tr>
    <?php endforeach?>
</tbody>
</table>
        </div>
    </div>
</div>