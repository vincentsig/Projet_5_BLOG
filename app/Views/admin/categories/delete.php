<?php
$category= App::getInstance()->getTable('Category');
if(!empty($_POST))
{
    $result = $category->delete($_POST['id']);
    if($result)
    {
        header('Location: admin.php?page=admin.categories.index');
    }
    
}       