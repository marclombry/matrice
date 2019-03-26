<?php
$config = require "../../database/config.php";
require "../../database/db.php";

$database = DB::getInstance();
use core\app\classes\traits\Hydrate;
use core\app\classes\Route;
use \core\app\src\model\rawMaterial;
use core\app\src\model\Authentify;
use core\app\src\model\Profil;

if(isset($_GET['id'])){
	$res = $database->select("SELECT * FROM rawmaterial
	");
	echo json_encode($res);
}