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
        <td><?=filter_var($post->content, FILTER_SANITIZE_STRING) ; ?></td>
        <td>
        <form action="?page=admin.posts.publish" method="post" style="display: inline;">
            <input type="hidden" name="id" value="<?=filter_var($post->id, FILTER_SANITIZE_NUMBER_INT); ?>">
            <button type="submit" class="btn btn-danger">publier</button>
        </form>
        <form action="?page=admin.posts.delete" method="post" style="display: inline;">
            <input type="hidden" name="id" value="<?=filter_var($post->id, FILTER_SANITIZE_NUMBER_INT); ?>">
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