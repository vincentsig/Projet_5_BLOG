<?php foreach ($posts as $post): ?>
    
      <h2><a href="<?= $post->url ?>"><?= $post->title; ?></a></h2>
      <p><?= $post->date_created?></p>
      <p>Category: <?= $post->category;?></p>
      <p><?= $post->lead_in?></p>
      <p><?php echo  $post->getExcerpt();?></p>
      
<?php endforeach?>