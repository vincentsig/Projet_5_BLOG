
<?php foreach($flashs as $flash): ?>
<div class="alert alert-info">
<ul>
    <li><?=$flash; ?></li>
</ul>
</div>
      
<?php endforeach; ?>

<div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
        <div class="post-preview">
            <h4 class="post-title">
                  <?= $post->title; ?>
            </h4>
            <p class="post-meta">Posté par
              <?= $post->username;?>, le <?= $post->date_created;?><br>
              tag: <?= $post->category;?>
            </p>
            <p><?= $post->content?></p>
        </div>    
        </div>
      </div>

</div>

<h5>Commentaires( <?php foreach($count as $value): ?>
                    <?=$value; ?>)
                <?php endforeach?>
</h5>


<div>
     <ul>
     <?php  foreach($comments as $comment): ?>
            <li>
                  <p>Autheur : <?=$comment->username; ?></p>
                  <p><?=$comment->content; ?></p>  
            </li>    
            <?php endforeach?>  
     </ul>    
</div>


<div>
<blockquote>
     <ul>
     <?php  foreach($waiting_coms as $com): ?>
     <p>Ce commentaire est en attente de validation. Il sera rendu public 
      après qu'un des admnistrateur du site aura vérifié son contenu. Merci de votre compréhension</p>
            <li>
      <blockquote>
                  <p><?=$com->content; ?></p>  
            </li>    
            <?php endforeach?>
     </ul> 
     </blockquote>   
</div>
<div>
      <form method="post">
      <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
      <button class="btn btn-primary">Sauvegarder</button> 
      </form>
</div>