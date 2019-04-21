<?php foreach ($flashs as $type => $message): ?>
<div class="alert alert-<?=filter_var($type, FILTER_SANITIZE_STRING); ?>">
  <ul>
    <li><?=filter_var($message, FILTER_SANITIZE_STRING);?></li>
    </div>
  </ul>
<?php endforeach; ?>
<div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-8 mx-auto">
          <div class="page-heading">
             <h2>About Me</h2>
           <p>Bonjour, je m'appelle Vincent, j'ai 31 ans et je suis actuellement en formation pour devenir développeur web.
            Après avoir travaillé dans différents domaines et sur différents continents, j'ai décidé de me reconvertir vers
             la fin de l'année 2019.<br>
            Le développement web m'a toujours attiré, je suis une personne curieuse et passionnée. Le milieu de la programmation
            me permet d'apprendre et de découvrir de nouvelles choses chaque jours.</p>
      
            <p>Je suis d'avantage spécialisé en programmation back-end avec le langage PHP et je suis capable de travailler sur
            toutes les étapes d'un projet, de sa conceptualisation à sa réalisation.</p>  
          </div>
      </div>     
</div>
<hr>

<h2>Mes Projets</h2>
 <br>     
<div class="container">
  <div class="row">
    <?php foreach ($posts as $post): ?>
      <div class="col-lg-6 col-md-8 mx-auto">
        <div class="post-preview">
          <a href="<?= $post->url ?>">
            <h4 class="post-title">
            <a href="<?= filter_var($post->url, FILTER_SANITIZE_STRING) ?>"><?= filter_var($post->title, FILTER_SANITIZE_STRING); ?></a>
            </h4>
            <p><?= filter_var($post->lead_in, FILTER_SANITIZE_STRING) ?><br><a class="btn btn-primary" href="<?=filter_var($post->url, FILTER_SANITIZE_STRING)?>">Suite</a></p>
            
            </a>
            <p class="post-meta">Posté par
              <?= filter_var($post->username, FILTER_SANITIZE_STRING);?>, le <?= filter_var($post->date_created, FILTER_SANITIZE_STRING);?>
              <?php if(isset($post->last_update)):?>, dernière modification : <?= filter_var($post->last_update, FILTER_SANITIZE_STRING)?><br>
              <?php endif;?>
              tag: <?=filter_var($post->category, FILTER_SANITIZE_STRING) ;?>
            </p>
        </div>
        <hr>
      </div>
    <?php endforeach?>
  </div>
</div>
   

<h2>Formulaire de contact</h2>

<?php  foreach ($errors as $error): ?>
    <li>
      <?=filter_var($error, FILTER_SANITIZE_STRING)?>;
    </li>
<?php endforeach?> 

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Si vous avez une question ou une suggestion, n'hésitez pas à me concacter avec le formulaire suivant.
          Je vous contacterais dès que possible.</p>
        
        <form action="" method="post">
            <?= $form->input('firstname', 'Prénom'); ?>
            <?= $form->input('surname', 'Nom'); ?>
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
