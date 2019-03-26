<?php
require_once('../../../init.php');
use \core\app\src\model\Authentify;
use \core\app\src\controller\AuthentifyController;
use \core\app\classes\Route;
use \core\app\admin\app\controller\AdminController;
require('controller/adminController.php');
if(isset($_POST) && !empty($_POST)){
	//$donnee = array_map('htmlspecialchars',$_POST);
	//AdminController::create($_POST);
	//var_dump($_POST);
}

if(isset($_SESSION['auth'])){
	AuthentifyController::Connexion();
}

if(isset($_GET['deco'])){
	AuthentifyController::Deconnexion();
}
if(isset($_SESSION['auth']['idgroup']) && $_SESSION['auth']['idgroup'] == 5)
{
	AdminController::setIsadmin(true);
	$admin = AdminController::getIsadmin();
}else {
	Route::url('/redirect');
}
$titleH1 = 'Modifier';
require_once("".RACINE."/app/admin/app/view/update.view.php");