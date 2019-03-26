<?php use \core\app\classes\Route;?>
<?php $title = 'Packagings'; ?>


<?php ob_start(); ?>

<h1><?= $titleH1; ?></h1>

<p><?= $describe; ?></p>


<?php

if(isset($_SESSION['auth'])){
	echo "bienvenue dans les Packagings";
}else{
	Route::url('/macata');
}

?>
<div id="formule_page" class="bg-emerald"></div>
<?php $content = ob_get_clean(); ?>


<?php require('templates/default.php'); ?>