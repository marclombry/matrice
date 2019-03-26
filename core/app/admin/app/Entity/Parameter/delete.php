<?php
require_once('../../../../../init.php');
use \core\app\src\model\Authentify;
use \core\app\src\controller\AuthentifyController;
use \core\app\classes\Route;
use \core\app\src\model\Modules;
use \core\app\src\controller\ModulesController;
use \core\app\admin\app\controller\AdminController;
use core\app\admin\app\controller\ParameterManager;
require('../../controller/adminController.php');
$action = 'delete';
$modules = ModulesController::ShowModule();
$module = isset($_GET['module'])? htmlentities($_GET['module']):'';
$parameter = new ParameterManager($database);
$raw = $parameter->Read();

//require "".RACINE."/app/src/controller/MatieresController.php";

if(isset($_GET['id'])){
	//AdminController::delete(htmlspecialchars($_GET['id']),$module);
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
require_once("../../view/Parameter/index.view.php");