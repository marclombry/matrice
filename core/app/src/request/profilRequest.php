<?php
$config = require "../../database/config.php";
require "../../database/db.php";

$database = DB::getInstance();
use core\app\classes\traits\Hydrate;
use \core\app\src\model\Formule;
use core\app\src\model\Authentify;
use core\app\src\model\Profil;
if(isset($_GET['id'])){
	$res = $database->select("SELECT profil.picture, profil.firstname,profil.lastname,profil.adresse, profil.cp, profil.city, profil.phone FROM profil 
	LEFT JOIN authentify
	ON authentify.id = profil.id WHERE authentify.id=1
	",true);
	echo json_encode($res);
}