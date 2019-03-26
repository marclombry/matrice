<?php
require_once('../../init.php');
use \core\app\src\model\Authentify;
use \core\app\src\controller\AuthentifyController;
use core\app\classes\Route;

if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])){
		
	Route::Url('macata');
}


AuthentifyController::Connexion();
if(isset($_GET['deco'])){
	AuthentifyController::Deconnexion();
}
$titleH1 = 'Connexion';
require_once('view/login.view.php');