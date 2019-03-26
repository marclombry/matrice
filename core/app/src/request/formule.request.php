<?php
$config = require "../../database/config.php";
require "../../database/db.php";

$database = DB::getInstance();
use core\app\classes\traits\Hydrate;
use \core\app\src\model\Formule;

$formulesList=[];
$liste_formule = $database->select("SELECT id,code,name,statut FROM formule");
	foreach ($liste_formule as $key => $formules) {
		//$formule = new Formule();
		//$formule->hydrate($formule);
		$formulesList[]= $formules;
	}
	
echo json_encode($formulesList);
