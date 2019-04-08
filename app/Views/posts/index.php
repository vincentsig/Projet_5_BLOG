
<?php foreach($flashs as $flash): ?>
           <li><?= $flash; ?></li>
<?php endforeach; ?>
<?=var_dump($flashs);?>

<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
             <h1>Bienvenue sur mon Portefolio</h1>
            <span class="subheading">Jettez un oeil à mes derniers projet !</span>
          </div>
      </div>
</div>


<?=var_dump($contact)?>;

<div class="container">
    <div class="row">
    <?php foreach($posts as $post): ?>
      <div class="col-lg-6 col-md-8 mx-auto">
        <div class="post-preview">
          <a href="<?= $post->url ?>">
            <h2 class="post-title">
            <a href="<?= $post->url ?>"><?= $post->title; ?></a>
            </h2>
            <p><?= $post->lead_in ?></p>
          </a>
            <p class="post-meta">Posté par
            <?= $post->username;?>, le <?= $post->date_created;?><br>
            tag: <?= $post->category;?>
            </p>
        </div>
        <hr>
      </div>
      <?php endforeach?>
    </div>
</div>
   

<h2>Formulaire de contact</h2>

<?php  foreach($errors as $error): ?>
     
            <li>
                  <?=$error?>;
            </li>
       <?php endforeach?> 

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Si vous avez une question ou une suggestion, n'hésitez pas à me concacter avec le formulaire suivant. Je vous contacterais dès que possible.</p>
        
        <form action="" method="post">
            <?= $form->input('name', 'nom'); ?>
            <?= $form->input('email', 'Email'); ?>
            <?= $form->input('message', 'Message', ['type' => 'textarea']); ?>
            <button class="btn btn-primary">Envoyer</button> 
        </form>


        <hr>
      </div>
  </div>

  <h2>liste de toutes les catégories</h2>


  <div>
     <ul>
     <?php  foreach($categories as $category): ?>
     
            <li>
                  <a href="<?= $category->url; ?>"><?= $category->title; ?></a>
            </li>
       <?php endforeach?>      
     </ul> 
      
  </div>

</div>
