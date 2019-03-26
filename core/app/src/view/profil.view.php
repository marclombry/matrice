<?php 
	use core\app\classes\Form;
	use core\app\classes\FormFilter;
	use \core\app\classes\Route;
?>
<?php $title = 'profil'; ?>
<?php ob_start(); ?>
<h1 class="text-center cloud"><?= $titleH1; ?></h1>
<p><?= $describe; ?></p>
<div class="display-flex flex-wrap-wrap justify-content-center scale0-6">
	<div id="info_user" class="bg-dracula-orchid padding10 border-white opacity8 margin10 deep-left anim-rotate-full-reverse launcher-bigger">
		<h3 class="cloud">Modifier mes informations</h3>
		<div class="form-style bg-belize-hole margin10">
			<form method='post' enctype='multipart/form-data' id='formProfil' name='formProfil'>
				<label class="font20 cloud" for="pseudo">Nom : </label><p class="dracule-orchid"><input type="text" name="lastname" id="" value="" class=" width100 height30px" placeholder="<?=$user_info->lastname;?>"></p>
				<label class="font20 cloud" for="firstname">Prenom : </label><p class="dracule-orchid"><input type="text" name="firstname" id="" value="" class=" width100 height30px" placeholder="<?=$user_info->firstname;?>"></p>
				<!--<label class="cloud" for="email">Email : </label><p class="dracule-orchid"><input type="email" name="email" id="" value="" class=""></p>-->
				<label class="font20 cloud" for="picture">Avatar : </label><p class="dracule-orchid "><input type="file" name="picture" id="" value="" class=" width100 margin-auto rec-button void-success"></p>
				<label class="font20 cloud" for="adresse">Adresse : </label><p class="dracule-orchid"><input type="text" name="adresse" id="" value="" class=" width100 height30px" placeholder="<?=$user_info->adresse;?>"></p>
				<label class="font20 cloud" for="cp">Code postal : </label><p class="dracule-orchid"><input type="text" name="cp" id="" value="" class=" width100 height30px" placeholder="<?=$user_info->cp;?>"></p>
				<label class="font20 cloud" for="city">Ville : </label><p class="dracule-orchid"><input type="text" name="city" id="" value="" class=" width100 height30px" placeholder="<?=$user_info->city;?>"></p>
				<label class="font20 cloud" for="phone"> Mobile : </label><p class="dracule-orchid"><input type="text" name="phone" id="" value="" class=" width100 height30px" placeholder="<?=$user_info->phone;?>"></p>
				<p class=""><button class="dracule-orchid rec-button void-success width100" type="submit" name="addinfo" id="addinfo" value="confirmer">Confirmer</button></p>
			</form>
		</div>
	</div>
	<div id="info_user_complete" class="bg-dracula-orchid padding10 border-white cloud opacity8 margin10 deep-right anim-rotate-full launcher-bigger">
		<div id='retour'></div>	
		<?php 
		if(isset($_SESSION['auth'])){
			echo'<ul><li class="list-none font20 margin5-0"><span class="glyphicon glyphicon-envelope"></span>&nbsp; Email : '.$_SESSION['auth']['email'].'</li></ul>';
		}
		?>
	</div>
</div>
<script>
	let id = <?php echo $_SESSION['auth']['idprofil'];?>;
	asyncawait("http://localhost/macata/core/app/src/request/profilRequest.php?id=id",'blur','p','data','bg-carrot').then(function(response){
		let myForm = document.forms['formProfil'];
		myForm.elements['lastname'].value = JSON.parse(response).lastname;
		myForm.elements['firstname'].value = JSON.parse(response).firstname;
		myForm.elements['adresse'].value = JSON.parse(response).adresse;
		myForm.elements['cp'].value = JSON.parse(response).cp;
		myForm.elements['city'].value = JSON.parse(response).city;
		myForm.elements['phone'].value = JSON.parse(response).phone;
		document.getElementById('retour').innerHTML = `<h3>Profil utilisateur</h3><ul>
		<li class="list-none font20 margin5-0"><img src="http://localhost/macata/core/app/public/images/${JSON.parse(response).picture}" alt="${JSON.parse(response).lastname} photo" class="width200px anim-rotate-full-reverse"></li>
		<li class="list-none font20 margin5-0"><span class="glyphicon glyphicon-user"></span>&nbsp;Nom :&nbsp;${JSON.parse(response).lastname}</li>
		<li class="list-none font20 margin5-0"><span class="glyphicon glyphicon-user"></span>&nbsp;Prenom :&nbsp;${JSON.parse(response).firstname}</li>
		<li class="list-none font20 margin5-0"><span class="glyphicon glyphicon-road"></span>&nbsp;Adresse :&nbsp;${JSON.parse(response).adresse}</li>
		<li class="list-none font20 margin5-0"><span class="glyphicon glyphicon-send"></span>&nbsp;Code postal :&nbsp;${JSON.parse(response).cp}</li>
		<li class="list-none font20 margin5-0"><span class="glyphicon glyphicon-plane"></span>&nbsp;Ville :&nbsp;${JSON.parse(response).city}</li>
		<li class="list-none font20 margin5-0"><span class="glyphicon glyphicon-earphone"></span>&nbsp;Mobile :&nbsp;${JSON.parse(response).phone}</li>
		</ul>`
		}
	);
</script>
<?php $content = ob_get_clean(); ?>
<?php require('templates/default.php'); ?>