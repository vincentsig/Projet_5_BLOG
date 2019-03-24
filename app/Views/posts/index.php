
<?php foreach($posts as $post): ?>
    
      <h2><a href="<?= $post->url ?>"><?= $post->title; ?></a></h2>
      <p>Category: <?= $post->category;?></p>

      <p><?php echo  $post->getExcerpt();?></p>
     
<?php endforeach?>

      

        <h1>HELLO WORLDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD</h1>
  <hr>

<h2>liste de toutes les catégories</h2>


<div>
     <ul>
     <?php  foreach($categories as $category): ?>
     
            <li>
                  <a href="<?= $category->url; ?>"><?= $category->title; ?></a>
            </li>
     </ul> 
      
</div>

<?php endforeach?>