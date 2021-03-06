<?php
require_once('../../../../../init.php');
use \core\app\src\model\Authentify;
use \core\app\src\controller\AuthentifyController;
use \core\app\classes\Route;
use \core\app\src\model\Modules;
use \core\app\src\controller\ModulesController;
use \core\app\admin\app\controller\AdminController;
use core\app\admin\app\controller\ParameterManager;
use \core\app\classes\FormFilter;
require('../../controller/adminController.php');
$action = 'update';
$auth = $_SESSION['auth']['email'];
$modules = ModulesController::ShowModule();
$module = isset($_GET['module'])? htmlentities($_GET['module']):'';
$parameter = new ParameterManager($database);
$old = $parameter->read();

if(isset($_POST)){
	//$up = $rawmaterial->update('rawmaterial',$fields,$values,$id);

	$id = isset($_POST['id'])?htmlspecialchars($_POST['id']):null;
	FormFilter::input_filter($_POST);
	foreach ($_POST as $key => $value) {
		if($value !='Modifier'){
			$parameter->update('parameter',htmlspecialchars($key),htmlspecialchars($value),$id);
			
		}
	}
	// update old value

	//$parameter->History($auth,$_POST, 'traceability',":username,:oldValue,:newValue,:dateTraceability,:action,:module",'modifier',$module);
	$parameter->History($auth,$_POST, 'traceability',":username,:oldValue,:newValue,:dateTraceability,:action,:module",'modifier','parameter');
	$message =(isset($_POST['update']))? '<p class="message-success padding10 font-bold text-center anim-pulse-success">Updade réussie ! <span class="glyphicon glyphicon-thumbs-up anim-vibrate"></span></p>':'';
}

$raw = $parameter->read();

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
require_once("../../view/Parameter/index.view.php");