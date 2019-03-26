<?php
$config = require "../../database/config.php";
require "../../database/db.php";

$database = DB::getInstance();
use core\app\classes\traits\Hydrate;
use \core\app\src\model\Formule;

$v = isset($_GET['d'])?$_GET['d']:'non';
$formulesList=[];
$liste_formule = $database->select("SELECT id,code,name,statut FROM formule WHERE statut LIKE '%$v%'",true);
	foreach ($liste_formule as $key => $formules) {
		//$formule = new Formule();
		//$formule->hydrate($formule);
		$formulesList[]= $formules;
	}
//$g ='GAPI';
//$req = $database->selprep("SELECT id,code,name,statut FROM formule WHERE statut = ?",$g,true);

//echo json_encode($req[0]);
echo json_encode($liste_formule);
