<?php
require_once('../../../../init.php');
use \core\app\src\model\Authentify;
use \core\app\src\controller\AuthentifyController;
use \core\app\classes\Route;
use \core\app\admin\app\controller\AdminController;
require('../controller/adminController.php');
global $database;
$module = isset($_GET['module'])? htmlentities($_GET['module']):'';
if(isset($_GET['id'])){
	AdminController::delete(htmlspecialchars($_GET['id']),$module);
	$auth = $_SESSION['auth']['email'];
	AdminController::History($auth,$_GET, 'traceability',":username,:oldValue,:newValue,:dateTraceability,:action,:module",'supprimer',$module);
    
}

switch ($module) {
	case 'rawmaterial':
		header("location:/macata/delete/Matières-premières");
		break;
	case 'formule':
		header("location:/macata/delete/Formules");
		break;
	case 'article':
		header("location:/macata/delete/Articles");
		break;
	case 'packaging':
		header("location:/macata/delete/Packagings");
		break;
	case 'parameter':
		header("location:/macata/delete/Paramètres");
		break;
	case 'authentify':
		header("location:/macata/register");
		break;
	default:
		# code...
		break;
}
