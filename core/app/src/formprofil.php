<?php
require_once('../../init.php');
use \core\app\src\model\Authentify;
use \core\app\src\model\profil;
use \core\app\src\controller\AuthentifyController;
use \core\app\src\controller\ProfilController;
use core\app\classes\Route;
use core\app\classes\Form;
global $database;
$auth_id = $_SESSION['auth']['id'];

$all = $database->qry("SELECT profil.picture, profil.adresse, profil.cp, profil.city, profil.phone FROM profil 
			LEFT JOIN authentify
			ON authentify.id = profil.id_user WHERE authentify.id=$auth_id");
/*
	if($_SESSION['auth']){
			foreach ($user as $key => $value) {
				if($key =='pseudo' || $key =='email'){
					echo '<li>'.ucfirst($key).' : '.$value.'</li>';
				}	
			}
		}

		if(is_array($all)){
			echo '<ul>';
			foreach ($all as $key => $value) {
				if($key ==='picture' || $key ==='adresse' || $key ==='cp' || $key ==='city' || $key === 'phone'){
					echo '<li>'.ucfirst($key).' : '.$value.'</li>';
				}	
			}
			echo '</ul>';
		}
*/