<?php
use core\app\src\controller\PackagingsController;
use core\app\admin\app\controller\PackagingManager;
require "../../../init.php";
require "".RACINE."/app/src/controller/PackagingsController.php";
if(isset($_POST) && !empty($_POST['reference'])){
	//AdminController::Create($_POST,'rawmaterial',":name,:icon,:price,:datemodification");
	$auth = $_SESSION['auth']['email'];
	$packaging = new PackagingManager($database);
	$packaging->Create($_POST,'packaging',":reference,:visuel,:cost,:transportcost");
	$packaging->History($auth,$_POST, 'traceability',":username,:oldValue,:newValue,:dateTraceability,:action,:module");

}

$req = PackagingsController::ListPackagings();
$method = isset($_GET['method']) ? htmlentities($_GET['method']) : '';
$table ='packaging';
echo "<div class='display-flex flex-wrap-wrap justify-content-center'>";
array_map(function($index){
	global $method;
	//var_dump($index);
	global $table;
	echo '<div class=" bg-paradise-green dupain margin10 padding10 filter-effect-show opacity9 launcher-bigger">
		<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->getId().'<div ><a class="tomato-red" href="/macata/delete/'.$table.'/id/'.$index->getId().'?module='.$table.'">X</a></div></div>
		<div><span class="glyphicon glyphicon-list-alt"></span> Référence : '.$index->getReference().'</div>
		<div><span class="glyphicon glyphicon-eye-open"></span> Visuel : '.$index->getVisuel().'</div>
		<div><span class="glyphicon glyphicon-euro"></span> Coût : '.$index->getCost().'</div>
		<div><span class="glyphicon glyphicon-plane"></span> Coût transport : '.$index->getTransportcost().'</div>
		</div>';
}, $req);
echo "</div>";