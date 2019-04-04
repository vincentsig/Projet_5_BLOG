
<div class="alert alert-success">
      <?=$_SESSION['flash']['success'];?>
            </div>

<h1>Bienvenue sur mon blog</h1>

<div class="container">
    <div class="row">
    <?php foreach($posts as $post): ?>
      <div class="col-lg-6 col-md-8 mx-auto">
        <div class="post-preview">
          <a href="<?= $post->url ?>">
            <h2 class="post-title">
            <a href="<?= $post->url ?>"><?= $post->title; ?></a>
            </h2>
            <h3 class="post-subtitle">
            <?= $post->lead_in ?>
            </h3>
          </a>
            <p class="post-meta">Posted by
                   Mettre le nom de l'auteur, le <?= $post->date_created;?>
            </p>
        </div>
        <hr>
        </div>
        <?php endforeach?>
        </div>
</div>
   
  <hr>
<h2>Formulaire de contact</h2>



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

