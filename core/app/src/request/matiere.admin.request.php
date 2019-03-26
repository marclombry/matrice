<?php
use core\app\src\controller\RawMaterialController;
use core\app\admin\app\controller\AdminController;
use core\app\admin\app\controller\RawMaterialManager;
require "../../../init.php";
require "".RACINE."/app/src/controller/MatieresController.php";
if(isset($_POST) && !empty($_POST['designation'])){
	$auth = $_SESSION['auth']['email'];
	//AdminController::Create($_POST,'rawmaterial',":name,:icon,:price,:datemodification");
	$rawmaterial = new RawMaterialManager($database);
	$rawmaterial->Create($_POST,'rawmaterial',":designation,:unitprice,:datecreation,:datemodification");
	$rawmaterial->History($auth,$_POST, 'traceability',":username,:oldValue,:newValue,:dateTraceability,:action,:module");
	
}

$order = isset($_GET['order']) ? htmlentities($_GET['order']):"ORDER BY id ASC";
$req = RawMaterialController::ListMaterial($order);
$method = isset($_GET['method']) ? htmlentities($_GET['method']) : '';
$table = 'rawmaterial';
echo "<div class='display-flex flex-wrap-wrap justify-content-center'>";
array_map(function($index){
	global $method;
	global $table;
	//var_dump($index);
	echo '<div class=" bg-tomato-red margin10 padding10 filter-effect-show opacity9 ">
		<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->getId().'<div ><a onclick=sup(); class="silver" href="/macata/delete/'.$table.'/id/'.$index->getId().'?module='.$table.'">X</a></div></div>
		<div><span class="glyphicon glyphicon-user"></span> Désignation : '.$index->getDesignation().'</div>
		<div><span class="glyphicon glyphicon-euro"></span> Prix unitaire : '.$index->getUnitprice().' €</div>
		<div><span class="glyphicon glyphicon-calendar"></span> Date de Création : '.$index->getDatecreation().'</div>
		<div><span class="glyphicon glyphicon-calendar"></span> Date de Modification : '.$index->getDatemodification().'</div>
		</div>';
}, $req);
echo "</div>";