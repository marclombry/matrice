<?php use \core\app\classes\Route;?>
<?php $title = 'Matières premières'; ?>
<?php ob_start(); ?>
<h1 class="text-center bg-cloud"><?= $titleH1; ?></h1>
<p><?= $describe; ?></p>
<?php
if(isset($_SESSION['auth'])){
	
?>
<div id="retour" class="display-flex flex-wrap-wrap"></div>
<script>
	let id = <?php echo $_SESSION['auth']['idprofil'];?>;
	let retour = document.getElementById('retour');let temp='';
	asyncawait("http://localhost/macata/core/app/src/request/matiereRequest.php?id=id",'blur','p','data','bg-carrot').then(function(response){
		JSON.parse(response).forEach(function(index){
			temp += `<ul class="bg-carrot margin10">
			<li class="list-none font20 margin5-0">&nbsp;ID :&nbsp;${index.id}</li>
			<li class="list-none font20 margin5-0">&nbsp;Désignation :&nbsp;${index.designation}</li>
			<li class="list-none font20 margin5-0">&nbsp;Prix unitaire :&nbsp;${index.unitprice} €</li>
			<li class="list-none font20 margin5-0">&nbsp;Dernière modification le :&nbsp;${index.datecreation}</li>
			<li class="list-none font20 margin5-0">&nbsp;Dernière modification le :&nbsp;${index.datemodification}</li>
			</ul>`
		});
		retour.innerHTML = `${temp}`;
		}
	);
</script>
<?php
}else{
	Route::url('/macata');
}
?>
<?php $content = ob_get_clean(); ?>
<?php require('templates/default.php'); ?>