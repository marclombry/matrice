<?php use \core\app\classes\Route;?>
<?php $title = 'Admin Home'; ?>
<?php $titleH1 ='Administration / '. $action;?>

<?php ob_start(); ?>

<p><?= $describe; ?></p>
<?php require_once("../../view/partials/module.view.php");?>
<div id="show_module"></div>
<div id="show_form"></div>
<div id="show_request"></div>
<?php
if(isset($auth) || isset($_SESSION['auth']) && $_SESSION['auth']['idgroup'] ==5){
	echo $message;
	echo "<div id='block' class='display-flex flex-wrap-wrap justify-content-space-between'>";
	if($action !='update'){
		foreach ($raw as $key => $index) {
		echo '<div class=" bg-carrot-orange margin10 padding10 filter-effect-show opacity9 ">
			<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->id.' <div class="launcher-bigger"><a class="tomato-red" href="/macata/delete/article/id/'.$index->id.'?module=article">X</a></div></div>
			<div><span class="glyphicon glyphicon-list-alt"></span> Référence : '.$index->reference.'</div>
			<div><span class="glyphicon glyphicon-globe"></span> Langue : '.$index->language.'</div>
			<div><span class="glyphicon glyphicon-leaf"></span> Gamme : '.$index->gamme.'</div>
			<div><span class="glyphicon glyphicon-glass"></span> Formulation : '.$index->formulation.'</div>
			<div><span class="glyphicon glyphicon-inbox"></span> Contenence : '.$index->contenence.'</div>
			<div><span class="glyphicon glyphicon-oil"></span> Volume : '.$index->volume.'</div>
			<div><span class="glyphicon glyphicon-globe"></span> Désignation : '.$index->designation.'</div>
			</div>';

		}
	} else {
		foreach ($raw as $key => $index) {
			echo '<div class=" bg-dupain margin10 padding10 filter-effect-show opacity9 cloud ">
			<form action="" method="POST">
			<input type="hidden" name="id" value="'.$index->id.'">
			<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->id.'<div ><a id="'.$index->id.'" onclick=sup('.$index->id.'); class="silver" href="/macata/delete/article/id/'.$index->id.'?module=article">X</a></div></div>
			<div class="margin10 "><span class="glyphicon glyphicon-envelope"></span> Code : <input class="dracula-orchid" type="text" name="reference" placeholder ="'.$index->reference.'" value="'.$index->reference.'" /></div>
			<div class="margin10 "><span class="glyphicon glyphicon-equalizer"></span> Nom : <input class="dracula-orchid" type="text" name="language" placeholder ="'.$index->language.'" value="'.$index->language.'" /></div>
			<div class="margin10 "><span class="glyphicon glyphicon-globe"></span> Gamme : <input class="dracula-orchid" type="text" name="gamme" placeholder ="'.$index->gamme.'" value="'.$index->gamme.'" /></div>
			<div class="margin10 "><span class="glyphicon glyphicon-globe"></span> Formulation : <input class="dracula-orchid" type="text" name="formulation" placeholder ="'.$index->formulation.'" value="'.$index->formulation.'" /></div>
			<div class="margin10 "><span class="glyphicon glyphicon-globe"></span> Contenance : <input class="dracula-orchid" type="text" name="contenence" placeholder ="'.$index->contenence.'" value="'.$index->contenence.'" /></div>
			<div class="margin10 "><span class="glyphicon glyphicon-globe"></span> Volume : <input class="dracula-orchid" type="text" name="volume" placeholder ="'.$index->volume.'" value="'.$index->volume.'" /></div>
			<div class="margin10 "><span class="glyphicon glyphicon-globe"></span> Désignation : <input class="dracula-orchid" type="text" name="designation" placeholder ="'.$index->designation.'" value="'.$index->designation.'" /></div>
			<input class="dracula-orchid" type="hidden" name="datemodification" placeholder ="'.date('Y-m-d').'"  value="'.date('Y-m-d').'"/>
			<div><input class="rec-button void-success bg-carrot" type="submit" name="update" value ="Modifier"></div>
			</form>
			</div>';
		}
	}
	echo "</div>";
}else{
	Route::url('redirect');
}
?>
<!--<script src="http://localhost/macata/core/app/public/js/adminDelete.js"/>-->

</div>

<?php $content = ob_get_clean(); ?>


<?php require("".RACINE."/app/src/view/templates/default.php"); ?>