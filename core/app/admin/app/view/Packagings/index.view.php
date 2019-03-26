<?php use \core\app\classes\Route;?>
<?php $title = 'Admin Home'; ?>
<?php $titleH1 ='Administration / Supprimer';?>

<?php ob_start(); ?>

<p><?= $describe; ?></p>
<?php require_once("../../view/partials/module.view.php");?>
<div id="show_module"></div>
<div id="show_form"></div>
<div id="show_request"></div>
<?php
if(isset($auth) || isset($_SESSION['auth']) && $_SESSION['auth']['idgroup'] ==5){
	echo "<div id='block' class='display-flex flex-wrap-wrap justify-content-space-between'>";
	if($action !='update'){
		foreach ($raw as $key => $index) {
		echo '<div class=" bg-paradise-green dupain margin10 padding10 filter-effect-show opacity9 ">
			<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->id.'<div ><a class="tomato-red" href="/macata/delete/packaging/id/'.$index->id.'?module=packaging">X</a></div></div>
			<div><span class="glyphicon glyphicon-list-alt"></span> Référence : '.$index->reference.'</div>
			<div><span class="glyphicon glyphicon-eye-open"></span> Visuel : '.$index->visuel.'</div>
			<div><span class="glyphicon glyphicon-euro"></span> Coût : '.$index->cost.'</div>
			<div><span class="glyphicon glyphicon-plane"></span> Coût transport : '.$index->transportcost.'</div>
			</div>';
		}
	} else {

		foreach ($raw as $key => $index) {
			echo '<div class=" bg-paradise-green dupain margin10 padding10 filter-effect-show opacity9 cloud ">
			<form action="" method="POST">
			<input type="hidden" name="id" value="'.$index->id.'">
			<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->id.'<div ><a id="'.$index->id.'" onclick=sup('.$index->id.'); class="silver" href="/macata/delete/packaging/id/'.$index->id.'?module=packaging">X</a></div></div>
			<div class="margin10 "><span class="glyphicon glyphicon-list-alt"></span> Référence : <input class="dracula-orchid" type="text" name="reference" placeholder ="'.$index->reference.'" value="'.$index->reference.'" /></div>
			<div class="margin10 "><span class="glyphicon glyphicon-eye-open"></span> Visuel : <input class="dracula-orchid" type="text" name="visuel" placeholder ="'.$index->visuel.'" value="'.$index->visuel.'" /></div>
			<div class="margin10 "><span class="glyphicon glyphicon-euro"></span> Cout : <input class="dracula-orchid" type="text" name="cost" placeholder ="'.$index->cost.'" value="'.$index->cost.'" /></div>
			<div class="margin10 "><span class="glyphicon glyphicon-plane"></span> Cout Transport : <input class="dracula-orchid" type="text" name="transportcost" placeholder ="'.$index->transportcost.'" value="'.$index->transportcost.'" /></div>
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