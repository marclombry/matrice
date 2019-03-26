<?php
use core\app\src\controller\FormulesController;
use core\app\admin\app\controller\AdminController;
use core\app\admin\app\controller\FormuleManager;
require "../../../init.php";
require "".RACINE."/app/src/controller/FormulesController.php";

if(isset($_POST) && !empty($_POST['name'])){

	//AdminController::Create($_POST,'rawmaterial',":name,:icon,:price,:datemodification");
	$auth = $_SESSION['auth']['email'];
	$formule = new FormuleManager($database);
	$formule->Create($_POST,'formule',":code,:name,:statut");
	$formule->History($auth,$_POST, 'traceability',":username,:oldValue,:newValue,:dateTraceability,:action,:module");
}

$req = FormulesController::ListFormule();
$method = isset($_GET['method']) ? htmlentities($_GET['method']) : '';
$table ='formule';
echo "<div class='display-flex flex-wrap-wrap justify-content-center'>";
array_map(function($index){
	global $method;
	global $table;
	//var_dump($index);
	echo '<div class=" bg-dupain margin10 padding10 filter-effect-show opacity9 launcher-bigger">
		<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->getId().'<div ><a class="tomato-red" href="/macata/delete/'.$table.'/id/'.$index->getId().'?module='.$table.'">X</a></div></div>
		<div><span class="glyphicon glyphicon-envelope"></span> Email : '.$index->getCode().'</div>
		<div><span class="glyphicon glyphicon-equalizer"></span> ID Groupe : '.$index->getName().'</div>
		<div><span class="glyphicon glyphicon-globe"></span> ID Profil : '.$index->getStatut().'</div>
		</div>';
}, $req);
echo "</div>";