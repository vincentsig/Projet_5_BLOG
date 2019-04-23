
<article>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
            <?php foreach ($posts as $post): ?>
            <h2><a href="<?= filter_var($post->url, FILTER_SANITIZE_STRING) ?>"><?=filter_var($post->title, FILTER_SANITIZE_STRING) ; ?></a></h2>
            
      
      <p><strong><?= filter_var($post->lead_in, FILTER_SANITIZE_STRING)?></strong></p>
      <p><?= htmlspecialchars_decode(substr($post->content,0,450));?>...</p>
      <p><a class="btn btn-primary" href="<?=filter_var($post->url, FILTER_SANITIZE_STRING)?>">Lire la suite</a></p>
      <div class="post-preview">
            
            <p class="post-meta">Posté par
              <?= filter_var($post->username, FILTER_SANITIZE_STRING);?>, le <?= filter_var($post->date_created, FILTER_SANITIZE_STRING);?>
              <?php if(isset($post->last_update)):?>, dernière modification : <?= filter_var($post->last_update, FILTER_SANITIZE_STRING)?><br>
              <?php endif;?>
              tag: <?=filter_var($post->category, FILTER_SANITIZE_STRING) ;?>
            </p>
    </div>
<?php endforeach?>
        </div>
      </div>
    </div>
  </article>
