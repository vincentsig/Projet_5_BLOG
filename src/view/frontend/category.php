<h2>liste de toutes les catégories</h2>
<?php foreach(App\Entity\Category::getCategories() as $category) : ?>

<div>
      
      <p><?= $category->title;?></p>
</div>

<?php endforeach?>