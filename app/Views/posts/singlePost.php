<h1><?= $post->title;?></h1>
<p><?= $post->lead_in?></p>
<p><?= $post->content;?></p>;



<h3>Commentaires( <?php foreach($count as $value): ?>
                    <?=$value; ?>)
                <?php endforeach?>
</h3>


<div>
     <ul>
     <?php  foreach($comments as $comment): ?>
            <li>
                  <?=$comment->content; ?>
            </li>
     </ul>    
</div>
<?php endforeach?>


