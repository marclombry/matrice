<?php $title = 'Admin Home'; ?>
<?php $titleH1 ='Administration';?>

<?php ob_start(); ?>
<div class="cloud">
<h1 class="text-center"><?= $titleH1; ?></h1>

<p><?= $describe; ?></p>


<?php
if(isset($auth) || isset($_SESSION['auth']) && $admin){
	echo 'Bienvenue dans le panneau d\'administration';
	var_dump($admin);
}

?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require("".RACINE."/app/src/view/templates/default.php"); ?>