<?php use \core\app\classes\Route;?>
<?php $title = 'Home'; ?>
<?php $titleH1 ='Macata';?>

<?php ob_start(); ?>
<div class="cloud">
<h1 class="text-center"><?= $titleH1; ?></h1>

<p><?= $describe; ?></p>
<?php
if(isset($auth) || isset($_SESSION['auth'])){
	echo '<div class="display-flex flex-wrap-wrap justify-content-center"> ';
	foreach ($modules as $key => $module) {
		echo '<div id='.utf8_encode(str_replace(' ','-', $module->getName())).' class="margin10 box opacity8 anim-rotatey-full '.$module->getBgcolor().' height200px width300px cloud text-bold margin-auto filter-effect-show">
				<div class="bg-cloud padding10 opacity10 height20"><a class="no-deco dracula-orchid height100 width100 display-block" href="'.utf8_encode(str_replace(' ','-', $module->getName())).'">'.utf8_encode($module->getName()).'</a></div>
				<div class="text-center height80 anim-hover-bigged"><a class="height100 width100 display-block " href="'.utf8_encode(str_replace(' ','-', $module->getName())).'"><span class=" font-size-larger icon-top-middle '.$module->getIcon().' '.$module->getColor().'"></span></a></div>
		</div>';
	}
	echo '</div>';
}
?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/default.php'); ?>