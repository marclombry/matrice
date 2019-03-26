<?php
require_once('../../../init.php');
require('controller/adminController.php');
use \core\app\classes\FormFilter;
use \core\app\classes\Html;
use \core\app\classes\Route;
use \core\app\classes\MySession;
use \core\app\src\model\Authentify;
use \core\app\src\model\Modules;
use \core\app\src\controller\AuthentifyController;
use \core\app\admin\app\controller\AdminController;
use \core\app\src\controller\ModulesController;


$auth = AuthentifyController::Connexion();
if(isset($_GET['deco'])){AuthentifyController::Deconnexion();}

//if(isset($auth)){$modules = ModulesController::moduleAuthorized($auth->getIdgroup());}
//if(isset($_SESSION['auth'])){$modules = ModulesController::moduleAuthorized($_SESSION['auth']['idgroup']);}
//var_dump(ModulesController::moduleAuthorizedByGroup($auth->getIdgroup()));
if(isset($_SESSION['auth']['idgroup']) && $_SESSION['auth']['idgroup'] == 5)
{
	AdminController::setIsadmin(true);
	$admin = AdminController::getIsadmin();
}else {
	Route::url('/redirect');
}
require_once("".RACINE."/app/admin/app/view/index.view.php");