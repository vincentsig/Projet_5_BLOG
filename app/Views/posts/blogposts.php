<?php foreach ($posts as $post): ?>
    
      <h2><a href="<?= filter_var($post->url, FILTER_SANITIZE_STRING) ?>"><?=filter_var($post->title, FILTER_SANITIZE_STRING) ; ?></a></h2>
      <p><?=filter_var($post->date_created, FILTER_SANITIZE_STRING) ?></p>
      <p>Category: <?=filter_var($post->category, FILTER_SANITIZE_STRING) ;?></p>
      <p><?= filter_var($post->lead_in, FILTER_SANITIZE_STRING)?></p>
      <p><?=filter_var( $post->content, FILTER_SANITIZE_STRING);?></p>
      
<?php endforeach?>