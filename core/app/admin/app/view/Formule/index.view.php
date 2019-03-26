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
		echo '<div class=" bg-dupain margin10 padding10 filter-effect-show opacity9 ">
			<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->id.'<div ><a class="tomato-red" href="/macata/delete/formule/id/'.$index->id.'?module=formule">X</a></div></div>
			<div><span class="glyphicon glyphicon-envelope"></span> Code : '.$index->code.'</div>
			<div><span class="glyphicon glyphicon-equalizer"></span> Nom : '.$index->name.'</div>
			<div><span class="glyphicon glyphicon-globe"></span> Statut : '.$index->statut.'</div>
			</div>';
		}
	} else {
		foreach ($raw as $key => $index) {
			echo '<div class=" bg-dupain margin10 padding10 filter-effect-show opacity9 cloud ">
			<form action="" method="POST">
			<input type="hidden" name="id" value="'.$index->id.'">
			<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->id.'<div ><a id="'.$index->id.'" onclick=sup('.$index->id.'); class="silver" href="/macata/delete/formule/id/'.$index->id.'?module=formule">X</a></div></div>
			<div class="margin10 "><span class="glyphicon glyphicon-envelope"></span> Code : <input class="dracula-orchid" type="text" name="code" placeholder ="'.$index->code.'" value="'.$index->code.'" /></div>
			<div class="margin10 "><span class="glyphicon glyphicon-equalizer"></span> Nom : <input class="dracula-orchid" type="text" name="name" placeholder ="'.$index->name.'" value="'.$index->name.'" /></div>
			<div class="margin10 "><span class="glyphicon glyphicon-globe"></span> Statut : <input class="dracula-orchid" type="text" name="statut" placeholder ="'.$index->statut.'" value="'.$index->statut.'" /></div>
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