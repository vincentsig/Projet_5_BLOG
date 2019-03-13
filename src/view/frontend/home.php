
<?php foreach(App\Entity\Post::getLast() as $post): ?>
    
      <h2><a href="<?= $post->getURL() ?>"><?= $post->title; ?></a></h2>
      <p>Category: <?= $post->category;?></p>

      <p><?php echo  $post->getExcerpt();?></p>
     
<?php endforeach?>

      

        <h1>HELLO WORLDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD</h1>
  <hr>

<h2>liste de toutes les catégories</h2>
<?php foreach(App\Entity\Category::getCategories() as $category) : ?>

<div>
      
      <p><?= $category->title;?></p>
</div>

<?php endforeach?>