
<div class="alert alert-success">
      <?=$_SESSION['flash']['success'];?>
            </div>



<?php foreach($posts as $post): ?>
    
      <h2><a href="<?= $post->url ?>"><?= $post->title; ?></a></h2>
      <p><?= $post->date_created?></p>
      <p>Category: <?= $post->category;?></p>
      <p><?= $post->lead_in?></p>
      <p><?php echo  $post->getExcerpt();?></p>
      
<?php endforeach?>



        <h1>HELLO WORLDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD</h1>
        
  <hr>
<h2>Formulaire de contact</h2>

<?=var_dump($flash);?>
<?=var_dump($session);?>

<h2>liste de toutes les catégories</h2>
<?=var_dump($_SESSION['auth']);?>
<?=var_dump($_SESSION['flash']);?>


<div>
     <ul>
     <?php  foreach($categories as $category): ?>
     
            <li>
                  <a href="<?= $category->url; ?>"><?= $category->title; ?></a>
            </li>
       <?php endforeach?>      
     </ul> 
      
</div>

