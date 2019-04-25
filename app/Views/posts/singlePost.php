<?php foreach ($flashs as $flash): ?>
<div class="alert alert-info">
<ul>
    <li><?=filter_var($flash, FILTER_SANITIZE_STRING); ?></li>
</ul>
</div>
      
<?php endforeach; ?>
<div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
        <div class="post-preview">
            <h4 class="post-title">
                  <?= filter_var($post->title, FILTER_SANITIZE_STRING); ?>
            </h4>
            <p class="post-meta">Posté par
              <?= filter_var($post->username, FILTER_SANITIZE_STRING);?>, le <?= filter_var($post->date_created, FILTER_SANITIZE_STRING);?><br>
              tag: <?= filter_var($post->category, FILTER_SANITIZE_STRING);?>
            </p>
            </div>   
            <p><?= htmlspecialchars_decode($post->content);?></p> 
            
        <?php if(isset($post->image_dir)):?>
        <div class="col-lg-6 col-md-10 mx-auto">       
            <a href=<?=filter_var($post->extern_link, FILTER_SANITIZE_URL)?> target="_blank"><img src="<?=filter_var($post->image_dir, FILTER_SANITIZE_STRING);?>" class="img-responsive" alt=""  width="460" height="345"></a>
        </div>
    <?php endif?>      
        </div>    
    </div>
</div>


<h5>Commentaires(<?php foreach ($count as $value):?>
                    <?=filter_var($value, FILTER_SANITIZE_STRING); ?>)
                <?php endforeach?>
</h5>





<div class="col-md-10 col-md-offset-4 col-sm-12">
<blockquote>
     <ul>
     <?php  foreach ($waiting_coms as $com): ?>
     <p>Ce commentaire est en attente de validation. Il sera rendu public 
      après qu'un des admnistrateur du site aura vérifié son contenu. Merci de votre compréhension</p>
            <li>
      <blockquote>
                  <p><?=filter_var($com->content, FILTER_SANITIZE_STRING); ?></p>  
            </li>    
            <?php endforeach?>
     </ul> 
     </blockquote>   
</div>



<div class="row bootstrap snippets">
    <div class="col-md-10 col-md-offset-4 col-sm-12">
        <div class="comment-wrapper">
            <div class="panel panel-info">
                <div class="panel-body">
                <?php  foreach ($comments as $comment): ?>
                    <ul class="media-list">
                                <span class="text-muted pull-right">
                                    <small class="text-muted">publié le <?=filter_var($comment->date_published, FILTER_SANITIZE_STRING); ?> :</small>
                                </span>
                                <strong class="text-success"><?=filter_var($comment->username, FILTER_SANITIZE_STRING); ?></strong>
                                <p>
                                    <?=filter_var($comment->content, FILTER_SANITIZE_STRING); ?>
                                </p>
                            </div>
                        </li>
                        <?php endforeach?>
                        
                        
                    </ul>
                
            </div>
        </div>

    </div>
</div>
<?php if(isset($_SESSION['auth'])): ?>
<div class="col-md-10 col-md-offset-4 col-sm-12">
      <form method="post">
      <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
      <button class="btn btn-primary">Sauvegarder</button> 
      </form>
</div>
<?php endif?>