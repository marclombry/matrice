<?php
use core\app\src\controller\ParametersController;
use core\app\admin\app\controller\ParameterManager;
require "../../../init.php";
require "".RACINE."/app/src/controller/ParametersController.php";
if(isset($_POST) && !empty($_POST['hourlyCost'])){
	//AdminController::Create($_POST,'rawmaterial',":name,:icon,:price,:datemodification");
	$auth = $_SESSION['auth']['email'];
	$parameter = new ParameterManager($database);
	$parameter->Create($_POST,'parameter',":hourlyCost");
	$parameter->History($auth,$_POST, 'traceability',":username,:oldValue,:newValue,:dateTraceability,:action,:module");
}

$req = ParametersController::ListParameters();
$method = isset($_GET['method']) ? htmlentities($_GET['method']) : '';
echo "<div class='display-flex flex-wrap-wrap justify-content-center'>";
array_map(function($index){
	global $method;
	//var_dump($index);
	echo '<div class="bg-hollyhock margin10 padding10 filter-effect-show opacity9 launcher-bigger">
	<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->getId().'<div ><a class="tomato-red" href="/macata/delete/parameter/id/'.$index->getId().'?module=parameter">X</a></div></div>
		<div><span class="glyphicon glyphicon-euro"></span> Coût à horaire : '.$index->getHourlyCost().' €</div>
		</div>';
}, $req);
echo "</div>";