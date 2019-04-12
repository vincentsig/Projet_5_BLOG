<?php foreach($flashs as $type => $message ): ?>
<div class="alert alert-<?= $type; ?>">
  <ul>
    <li><?=$message;?></li>
    </div>
  </ul>
<?php endforeach; ?>

<div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-8 mx-auto">
          <div class="page-heading">
             <h2>About Me</h2>
           <p>Bonjour, je m'appelle Vincent, j'ai 31 ans et je suis actuellement en formation pour devenir devellopeur web.
            Après avoir travaillé dans différents domaines et sur différents continents, j'ai décidé de me reconvertir vers
             la fin de l'année 2019.<br>
            Le devellopement web m'a toujours attiré, je suis une personne curieuse et passionnée. Le milieu de la programmation
            me permet d'apprendre et de découvrir de nouvelles choses chaque jours.</p>
      
            <p>Je suis d'avantage spécialisé en programmation back-end avec le langage PHP, et je suis capable de travailler sur
            toutes les étapes d'un projet, de sa conceptualisation à sa réalisation.</p>  
          </div>
      </div>     
</div>
<hr>

<h2>Mes Projets</h2>
 <br>     
<div class="container">
  <div class="row">
    <?php foreach($posts as $post): ?>
      <div class="col-lg-6 col-md-8 mx-auto">
        <div class="post-preview">
          <a href="<?= $post->url ?>">
            <h4 class="post-title">
            <a href="<?= $post->url ?>"><?= $post->title; ?></a>
            </h4>
            <p><?= $post->lead_in ?><br><a class="btn btn-primary" href="<?= $post->url ?>">Suite</a></p>
            
            </a>
            <p class="post-meta">Posté par
              <?= $post->username;?>, le <?= $post->date_created;?>, dernière modification : <?= $post->last_update?><br>
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
        <p>Si vous avez une question ou une suggestion, n'hésitez pas à me concacter avec le formulaire suivant.
          Je vous contacterais dès que possible.</p>
        
        <form action="" method="post">
            <?= $form->input('name', 'nom'); ?>
            <?= $form->input('email', 'Email'); ?>
            <?= $form->input('message', 'Message', ['type' => 'textarea']); ?>
            <button class="btn btn-primary">Envoyer</button> 
        </form>
        <hr>
      </div>
  </div>

  <h2>Mon CV</h2>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
      <a href="cv\CV_Signoret_Vincent.pdf" target="_blank">Cliquez ici pour voir le pdf</a>    
      </div>
    </div>
  </div>
</div>
