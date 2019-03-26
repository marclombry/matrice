<?php
require_once "../../../core/init.php";
use \core\app\classes\Form;
use \core\app\classes\FormFilter;
use \core\app\classes\Html;
use \core\app\classes\Route;
use \core\app\classes\MySession;
use \core\app\src\model\Authentify;
use \core\app\src\model\Modules;
use \core\app\src\controller\AuthentifyController;
use \core\app\src\controller\ModulesController;
use \core\app\admin\app\controller\AdminController;

$auth = AuthentifyController::Connexion();
if(isset($_GET['deco'])){AuthentifyController::Deconnexion();}

if(isset($auth)){$modules = ModulesController::moduleAuthorized($auth->getIdgroup());}
if(isset($_SESSION['auth'])){$modules = ModulesController::moduleAuthorized($_SESSION['auth']['idgroup']);}
//var_dump(ModulesController::moduleAuthorizedByGroup($auth->getIdgroup()));

require'../src/view/index.view.php';
if(!isset($_SESSION['auth']) && !isset($auth)){require'../src/view/partials/formular.view.php';}