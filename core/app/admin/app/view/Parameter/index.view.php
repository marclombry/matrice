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
			echo '<div class="bg-hollyhock margin10 padding10 filter-effect-show opacity9 ">
			<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->id.' <div class="launcher-bigger"><a class="tomato-red" href="/macata/delete/parameter/id/'.$index->id.'?module=parameter">X</a></div></div>
			<div><span class="glyphicon glyphicon-user"></span> ID : '.$index->id.'</div>
			<div><span class="glyphicon glyphicon-euro"></span> Coût à horaire : '.$index->hourlyCost.'</div>
			</div>';
			
		}
	} else {

		foreach ($raw as $key => $index) {
			
			echo '<div class=" bg-hollyhock margin10 padding10 filter-effect-show opacity9 cloud ">
			<form action="" method="POST">
			<input type="hidden" name="id" value="'.$index->id.'">
			<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->id.'<div ><a id="'.$index->id.'" onclick=sup('.$index->id.'); class="silver" href="/macata/delete/parameter/id/'.$index->id.'?module=parameter">X</a></div></div>
			<div class="margin10 "><span class="glyphicon glyphicon-euro"></span> Prix : <input class="dracula-orchid" type="text" name="hourlyCost" placeholder ="'.$index->hourlyCost.'" value="'.$index->hourlyCost.'" /></div>
			<input class="dracula-orchid" type="hidden" name="datecreation" placeholder ="'.date('Y-m-d').'"  value="'.date('Y-m-d').'"/>
			<div><input class="rec-button void-success bg-carrot" type="submit" name="update" value ="Modifier"></div>
			</form>
			</div>';
		}
		//var_dump($_SESSION);
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