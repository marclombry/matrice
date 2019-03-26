<?php
require_once('../../init.php');
use \core\app\src\model\Authentify;
use \core\app\src\model\profil;
use \core\app\src\controller\AuthentifyController;
use \core\app\src\controller\ProfilController;
use core\app\classes\Route;
use core\app\classes\Form;
use core\app\classes\Dropfile;
$titleH1 ='Bienvenue sur votre profil';
$describe ='';
$auth = new Authentify();
$auth->connexion();
$user = $auth->connexion();
$profil = new ProfilController();
$user_info = $profil->showProfil($user);

//$_SESSION['profil'] = $user_info;
//if post for update profil //
if(isset($_POST)){
	$profil->updateProfil($_POST,$user);
}
require_once('view/profil.view.php');
