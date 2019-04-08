<h1><?= $post->title;?></h1>
<p><?= $post->lead_in?></p>
<p><?= $post->content;?></p>;

<?=var_dump($_SESSION);?>

<h3>Commentaires( <?php foreach($count as $value): ?>
                    <?=$value; ?>)
                <?php endforeach?>
</h3>


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
     <ul>
     <?php  foreach($test as $te): ?>
            <li>
                  <p>Autheur : <?=$te->username; ?></p>
                  <p><?=$te->content; ?></p>  
            </li>    
            <?php endforeach?>  
     </ul>    
</div>
<div>
      <form method="post">
      <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
      <button class="btn btn-primary">Sauvegarder</button> 
      </form>
</div>