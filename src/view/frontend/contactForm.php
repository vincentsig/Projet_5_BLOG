<?php 

require '../src/model/Autoloader.php'; 
         Autoloader::register(); 

$form =new FormManager;
?>

<form action="#" method="post">

<?php 
echo $form->input('name','name');
echo $form->input('lastname','lastname');
echo $form->input('textarea', 'Message');
echo $form->submit();
?>

</form>




