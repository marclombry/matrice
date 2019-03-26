<?php
require_once('../../../init.php');
use \core\app\src\model\Authentify;
use \core\app\src\controller\AuthentifyController;
use \core\app\classes\Route;
use \core\app\admin\app\controller\AdminController;
$content='';
if(isset($_SESSION['auth'])){
	AuthentifyController::Connexion();
}

if(isset($_GET['deco'])){
	AuthentifyController::Deconnexion();
}
if(isset($_POST) && !empty($_POST))
{
	AuthentifyController::Register();
	if(AuthentifyController::Register() === false)
	{
		$error = "<p class='message-warning padding10 font-bold text-center anim-pulse'>Erreur lors de l'inscription... <span class='glyphicon glyphicon-thumbs-down anim-vibrate'></span></p>";
	}else{
		$error = "<p class='message-success padding10 font-bold text-center anim-pulse-success'>L'inscription est réussie ! <span class='glyphicon glyphicon-thumbs-up anim-vibrate'></span></p>";
	}
	
}
if(isset($_SESSION['auth']['idgroup']) && $_SESSION['auth']['idgroup'] == 5)
{
	AdminController::setIsadmin(true);
	$admin = AdminController::getIsadmin();
}else {
	//Route::url('/redirect');
}
$titleH1 = 'Inscription';
require_once("".RACINE."/app/admin/app/view/register.view.php");