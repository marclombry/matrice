<?php use \core\app\classes\Route;?>
<?php $title = 'Paramètres'; ?>


<?php ob_start(); ?>

<h1><?= $titleH1; ?></h1>

<p><?= $describe; ?></p>


<?php
if (isset($_SESSION['auth']['idgroup']) && $_SESSION['auth']['idgroup']==2) {
	echo "<div>achat</div>";
}

if(isset($_SESSION['auth'])){
	echo "bienvenue dans les Paramètres";
}else{
	Route::url('/macata');
}

?>

<?php $content = ob_get_clean(); ?>


<?php require('templates/default.php'); ?>