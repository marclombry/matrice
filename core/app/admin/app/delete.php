<?php

require_once('../../../init.php');
use \core\app\src\model\Authentify;
use \core\app\src\controller\AuthentifyController;
use \core\app\classes\Route;
use \core\app\src\model\Modules;
use \core\app\src\controller\ModulesController;
use \core\app\admin\app\controller\AdminController;
require('controller/adminController.php');
$action = 'delete';
$modules = ModulesController::ShowModule();
$module = isset($_GET['module'])? htmlentities($_GET['module']):'';
if(isset($_GET['id'])){
	AdminController::delete(htmlspecialchars($_GET['id']),$module);
	//Route::url('/redirect');
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
$titleH1 = 'Supprimer';
require_once("".RACINE."/app/admin/app/view/delete.view.php");
