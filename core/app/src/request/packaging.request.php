<?php
$config = require "../../database/config.php";
require "../../database/db.php";

$database = DB::getInstance();
use core\app\classes\traits\Hydrate;
use \core\app\src\model\Packaging;

$packagingsList=[];
$liste_packaging = $database->select("SELECT * FROM packaging");
	foreach ($liste_packaging as $key => $packagings) {
		//$packaging = new packaging();
		//$packaging->hydrate($packaging);
		$packagingsList[]= $packagings;
	}
echo json_encode($packagingsList);