<?php use \core\app\classes\Route;?>
<?php use \core\app\classes\Form;?>
<?php use \core\app\classes\FormFilter;?>
<?php use \core\app\classes\Html;?>
<?php $title = 'Admin Home'; ?>
<?php $titleH1 ='Administration / Inscription';?>
<?php ob_start(); ?>
<h1 class="text-center cloud"><?= $titleH1; ?></h1>
<p><?= $describe; ?></p>
<h2 class="text-center cloud anim-up">Inscription utilisateur</h2>
<div class="">
<div class="cloud">
<?php
if(isset($auth) || isset($_SESSION['auth']) && $_SESSION['auth']['idgroup'] ==5){
	echo '<div class="display-flex margin5-0">';
	echo '<form class="margin-auto padding10 zindex2 " id="inscription_form" method="post" action="">';
	echo '<p class="input-focus padding10"><label for="email"> Votre email :</label><input type="email" id="email" name="email" class="dracula-orchid" placeholder="Email" required > *</p>';
	echo '<p class="input-focus padding10"><label for="password"> Votre password :</label><input type="password" id="password" name="password" class="dracula-orchid" placeholder="Password" required > *</p>';
	echo '<p><input type="hidden" id="csrf" name="csrf" value="'.$_SESSION['form']['csrf'].'"></p>';
	echo '<button class="rec-button void-success dupain font-bold" type="submit" name="inscrire" id="inscrire">Inscrire</button>';
	echo '<div id="responseMessageError">'.$error.'</div></form><div class="sailMax bg-dupain width100 opacity2"></div></div>';
}else{
	Route::url('redirect');
}
?>
</div>
<div id="show_user" class="cloud display-flex flex-wrap-wrap last-add"></div>
</div>
<script>
/*
document.getElementById('inscrire').addEventListener("click", function(e){
	e.preventDefault();
	asyncawait("http://localhost/macata/core/app/src/request/auth.request.php").then(function(reponse){
	let jsonResponse = JSON.parse(reponse);let resultat='';
		jsonResponse.map(function(index){
			console.log(index)
			resultat+=`<p>${index.id}</p><p>${index.email}</p><p>${index.id_group}</p><p>${index.id_profil}</p><hr />`;
			
		});
	document.getElementById('show_user').innerHTML = resultat;
	});
});
*/
asyncawait("http://localhost/macata/core/app/src/request/auth.request.php").then(function(reponse){
	let jsonResponse = JSON.parse(reponse);let resultat='';let bgcolor='bg-dupain';
	jsonResponse.map(function(index){
		if(index.id_group <2){
			bgcolor='bg-dupain';
		}else if(index.id_group <=4){
			bgcolor='bg-emerald';
		}else{
			bgcolor='bg-pomegranate';
		}
		resultat+=`<div class="${bgcolor} margin10 padding10 filter-effect-show opacity9 launcher-bigger">
		<div class="display-flex flex-wrap-wrap justify-content-space-between">
			<div><span class="glyphicon glyphicon-user"></span> ID : ${index.id}</div>
			<div><a href="/macata/delete/register/id/${index.id}?module=authentify"><span class="glyphicon glyphicon-remove"></span></a></div>
		</div>
		<div><span class="glyphicon glyphicon-envelope"></span> Email : ${index.email}</div>
		<div><span class="glyphicon glyphicon-equalizer"></span> ID Groupe : ${index.id_group}</div>
		<div><span class="glyphicon glyphicon-globe"></span> ID Profil : ${index.id_profil}</div>
		</div>`;
	});
	document.getElementById('show_user').innerHTML = resultat;
});
</script>
<?php $content = ob_get_clean(); ?>
<?php require("".RACINE."/app/src/view/templates/default.php"); ?>