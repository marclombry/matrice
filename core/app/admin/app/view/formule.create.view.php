<?php use \core\app\classes\Route;?>
<?php use  \core\app\src\controller\ModulesController;?>
<?php $title = 'Admin Home'; ?>
<?php $titleH1 ='Administration / Ajout';?>

<?php ob_start(); ?>
<div class="cloud">
<h1 class="text-center"><?= $titleH1; ?></h1>
<p><?= $describe; ?></p>
<?php

if(isset($auth) || isset($_SESSION['auth']) && $_SESSION['auth']['idgroup'] ==5){
	echo 'Bienvenue dans le panneau d\'administration';
	$req = ModulesController::ShowModule();
	//$method = isset($_GET['method']) ? htmlentities($_GET['method']) : '';
	echo "<div class='display-flex flex-wrap-wrap justify-content-center'>";
	
	array_map(function($index){
		global $method;
		$opacity = utf8_encode(str_replace(' ','-', $index->getName()))!='Formules'?'opacity6':'';
		echo '<div id='.utf8_encode(str_replace(' ','-', $index->getName())).' class="'.$opacity.' margin10 box  '.$index->getBgcolor().' height200px width300px cloud text-bold margin-auto ">
					<div class="bg-cloud padding10 opacity10 height20"><a class="no-deco dracula-orchid height100 width100 display-block" href="http://localhost/macata/create/'.utf8_encode(str_replace(' ','-', $index->getName())).'">'.utf8_encode($index->getName()).'</a></div>
					<div class="text-center height80 anim-hover-bigged"><a class="height100 width100 display-block " href="http://localhost/macata/create/'.utf8_encode(str_replace(' ','-', $index->getName())).'"><span class=" font-size-larger icon-top-middle '.$index->getIcon().' '.$index->getColor().'"></span></a></div>
			</div>';
	}, $req);
	echo "</div>";
?>

<div id="show_module"></div>
<div id="show_form"></div>
<?php
if(isset($auth) || isset($_SESSION['auth']) && $_SESSION['auth']['idgroup'] ==5){

	echo '<div class="display-flex margin5-0">';
	echo '<form class="margin-auto padding10 zindex2 bg-dupain" id="form_add" method="post" action="">';
	echo '<p class="input-focus padding10"><label for="code"> Votre code :</label><input type="text" id="code" name="code" class="dracula-orchid" placeholder="code"> </p>';
	echo '<p class="input-focus padding10"><label for="name"> Votre name :</label><input type="text" id="name" name="name" class="dracula-orchid" placeholder="name" required > *</p>';
	echo '<p class="input-focus padding10"><label for="statut"> Votre statut :</label><input type="text" id="statut" name="statut" class="dracula-orchid" placeholder="statut"> </p>';
	echo '<input type="hidden" id="datemodification" name="datemodification" class="dracula-orchid" placeholder="datemodification" value="'.Date('Y-m-d').'">';
	echo '<input type="hidden" id="datecreation" name="datecreation" class="dracula-orchid" placeholder="datecreation" value="'.Date('Y-m-d').'">';	
	echo '<p><input type="hidden" id="csrf" name="csrf" value="'.$_SESSION['form']['csrf'].'"></p>';
	echo '<button class="rec-button void-success dupain font-bold" type="submit" name="ajoutez" id="ajoutez">ajoutez</button>';
	echo '<div id="responseMessageError">'.$error.'</div></form><div class="sailMax bg-dupain width100 opacity2"></div></div>';
}else{
	Route::url('redirect');
}
?>
<div id="show_request"></div>
<script>

let form_add = document.getElementById('form_add');
let button_add = document.getElementById('ajoutez');
asyncawait('http://localhost/macata/core/app/src/request/formule.admin.request.php').then(function(response){
		document.getElementById('show_request').innerHTML = response;
	});
button_add.addEventListener("click",function(e) {
	let code = document.getElementById('code').value;
	let name = document.getElementById('name').value;
	let statut = document.getElementById('statut').value;
	let datecreation = document.getElementById('datecreation').value;
	let datas = `code=${code}&name=${name}&statut=${statut}&datecreation=${datecreation}`;
	asyncawaitpost('http://localhost/macata/core/app/src/request/formule.admin.request.php',datas).then(function(response){
		document.getElementById('show_request').innerHTML = response;
	});
	e.preventDefault();
});

</script>


<?php
}else{
	Route::url('redirect');
}

?>

</div>
<?php $content = ob_get_clean(); ?>
<?php require("".RACINE."/app/src/view/templates/default.php"); ?>