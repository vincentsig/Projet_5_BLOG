<?php foreach ($flashs as $type => $message): ?>
<div class="alert alert-<?=filter_var($type, FILTER_SANITIZE_STRING); ?>">
  <ul>
    <li><?=filter_var($message, FILTER_SANITIZE_STRING);?></li>
    </div>
  </ul>
<?php endforeach; ?>
<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
    <p>Vous n'avez pas rempli le formulaire correctement</p>
    <ul>
        <?php foreach ($errors as $error): ?>
           <li><?=filter_var($error, FILTER_SANITIZE_STRING) ; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>
<div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-8 mx-auto">
          <div class="page-heading">
             <h2>À propos de moi</h2>
           <p>Bonjour, je m'appelle Vincent. J'ai 31 ans et je suis actuellement en formation pour devenir développeur web.
            Après avoir travaillé dans différents domaines et sur différents continents, j'ai décidé d'éffectuer une reconversion professionnelle en 2019.</p>
            <p>Le développement web m'a toujours attiré car je suis une personne curieuse et passionnée. En effet, ce milieu qui est en perpétuelle évolution me permet d'apprendre et de découvrir
            de nouvelles choses chaque jour. Spécialisé en programmation "back-end" avec le langage PHP, je peux travailler sur
            toutes les étapes d'un projet, et ce, du début de sa conceptualisation jusqu'à sa réalisation.</p>  
          </div>
      </div>     
</div>
<hr>

<h2>Mes Derniers Projets</h2>
 <br>     
<div class="container">
  <div class="row">
    <?php foreach ($posts as $post): ?>
      <div class="col-lg-5 col-md-8 mx-auto">
        <div class="post-preview">
          <a href="<?= filter_var($post->url, FILTER_SANITIZE_STRING) ?>">
            <h4 class="post-title">
            <a href="<?= filter_var($post->url, FILTER_SANITIZE_STRING) ?>"><?= filter_var($post->title, FILTER_SANITIZE_STRING); ?></a> 
            </h4>
            <br>
            <div>
              <a href="<?= filter_var($post->url, FILTER_SANITIZE_STRING) ?>">
                <img src="<?= filter_var($post->image_dir, FILTER_SANITIZE_STRING)?>" alt="logo" class="img-responsiv" height="120" width="220">
            </a>
            </div>
            <p><?= filter_var($post->lead_in, FILTER_SANITIZE_STRING) ?><br><a class="btn btn-primary" href="<?=filter_var($post->url, FILTER_SANITIZE_STRING)?>">Suite</a></p>
            
            </a>
            <p class="post-meta">Posté par
              <?= filter_var($post->username, FILTER_SANITIZE_STRING);?>, le <?= filter_var($post->date_created, FILTER_SANITIZE_STRING);?>
              <?php if (isset($post->last_update)):?>, dernière modification : <?= filter_var($post->last_update, FILTER_SANITIZE_STRING)?><br>
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

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Si vous avez une question ou une suggestion, n'hésitez pas à me concacter avec le formulaire suivant.
          Je vous répondrais le plus rapidement possible.</p>
        
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
      Si vous désirez en savoir plus sur mon parcours professionnel, vous pouvez consulter mon CV en cliquant sur les liens ci-dessous.
      </div>
  </div>
</div>
<br>
  <div class="container">
  <div class="row">
      <div class="col-lg-6 col-md-10 ">
       <a href="cv\CV_Signoret_Vincent.pdf" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fas fa-address-card fa-stack-1x fa-inverse"></i>
                </span>
                Format PDF
              </a>   
      </div>
      
      <div class="col-lg-6 col-md-10 ">
       <a href="https://www.linkedin.com/in/vincent-signoret-082944168/">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
                Profil Linkedin
              </a>   
      </div>

    </div>
  </div>
</div>
