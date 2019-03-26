<?php
use core\app\src\controller\ArticlesController;
use core\app\admin\app\controller\ArticleManager;
require "../../../init.php";
require "".RACINE."/app/src/controller/ArticlesController.php";
if(isset($_POST) && !empty($_POST['reference'])){

	//AdminController::Create($_POST,'rawmaterial',":name,:icon,:price,:datemodification");
	$auth = $_SESSION['auth']['email'];
	$article = new ArticleManager($database);
	$article->Create($_POST,'article',":reference,:designation,:code,:language,:gamme,:formulation,:contenence,:volume,:density");
	$article->History($auth,$_POST, 'traceability',":username,:oldValue,:newValue,:dateTraceability,:action,:module");

}
$req = ArticlesController::ListArticle();
$method = isset($_GET['method']) ? htmlentities($_GET['method']) : '';
$table = 'article';
echo "<div class='display-flex flex-wrap-wrap justify-content-center'>";
array_map(function($index){
	global $method;
	global $table;
	//var_dump($index);
	echo '<div class=" bg-carrot-orange margin10 padding10 filter-effect-show opacity9 launcher-bigger">
		<div class="display-flex justify-content-space-between"><span class="glyphicon glyphicon-user"></span> ID : '.$index->getId().' <div class=""><a class="tomato-red" href="/macata/delete/'.$table.'/id/'.$index->getId().'?module='.$table.'">X</a></div></div>
		<div><span class="glyphicon glyphicon-list-alt"></span> Référence : '.$index->getReference().'</div>
		<div><span class="glyphicon glyphicon-globe"></span> Langue : '.$index->getLanguage().'</div>
		<div><span class="glyphicon glyphicon-leaf"></span> Gamme : '.$index->getGamme().'</div>
		<div><span class="glyphicon glyphicon-glass"></span> Formulation : '.$index->getFormulation().'</div>
		<div><span class="glyphicon glyphicon-inbox"></span> Contenence : '.$index->getContenence().'</div>
		<div><span class="glyphicon glyphicon-oil"></span> Volume : '.$index->getVolume().'</div>
		<div><span class="glyphicon glyphicon-globe"></span> Désignation : '.$index->getDesignation().'</div>
		</div>';
}, $req);
echo "</div>";