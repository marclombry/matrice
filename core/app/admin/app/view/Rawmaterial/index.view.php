<?php use \core\app\classes\Route;?>
<?php $title = 'Admin Home'; ?>
<?php $titleH1 ='Administration / '.$action;?>

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
			echo '<div class=" bg-tomato-red margin10 padding10 filter-effect-show opacity9 ">
			<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->id.'<div ><a id="'.$index->id.'" onclick=sup('.$index->id.'); class="silver" href="/macata/delete/rawmaterial/id/'.$index->id.'?module=rawmaterial">X</a></div></div>
			<div><span class="glyphicon glyphicon-user"></span> Nom : '.$index->designation.'</div>
			<div><span class="glyphicon glyphicon-euro"></span> Prix : '.$index->unitprice.' €</div>
			<div><span class="glyphicon glyphicon-calendar"></span> Date de Creation : '.$index->datecreation.'</div>
			<div><span class="glyphicon glyphicon-calendar"></span> Date de Modification : '.$index->datemodification.'</div>
			</div>';
		}
	} else {

		foreach ($raw as $key => $index) {
			echo '<div class=" bg-tomato-red margin10 padding10 filter-effect-show opacity9 cloud ">
			<form action="" method="POST">
			<input type="hidden" name="id" value="'.$index->id.'">
			<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->id.'<div ><a id="'.$index->id.'" onclick=sup('.$index->id.'); class="silver" href="/macata/delete/rawmaterial/id/'.$index->id.'?module=rawmaterial">X</a></div></div>
			<div class="margin10 "><span class="glyphicon glyphicon-user"></span> Designation : <input class="dracula-orchid" type="text" name="designation" placeholder ="'.$index->designation.'" value="'.$index->designation.'"/></div>
			<div class="margin10 "><span class="glyphicon glyphicon-euro"></span> Prix unitaire : <input class="dracula-orchid" type="text" name="unitprice" placeholder ="'.$index->unitprice.'" value="'.$index->unitprice.'" /></div>
			<input class="dracula-orchid" type="hidden" name="datecreation" placeholder ="'.date('Y-m-d').'"  value="'.date('Y-m-d').'"/>
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
<script>
// au click sur la croix
// je lance la requete ajax pour delete les valeur
function sup(id){

}

</script>
</div>

<?php $content = ob_get_clean(); ?>


<?php require("".RACINE."/app/src/view/templates/default.php"); ?>