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
$titleH1 = "Matière premières";
require'../src/view/matiere.view.php';