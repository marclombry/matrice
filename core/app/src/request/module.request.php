<?php
use core\app\src\controller\ModulesController;
require "../../../init.php";
require "".RACINE."/app/src/controller/ModulesController.php";
$req = ModulesController::ShowModule();
$method = isset($_GET['method']) ? htmlentities($_GET['method']) : '';
echo "<div class='display-flex flex-wrap-wrap justify-content-center'>";
array_map(function($index){
	global $method;
	echo '<div id='.utf8_encode(str_replace(' ','-', $index->getName())).' class="margin10 box  '.$index->getBgcolor().' height200px width300px cloud text-bold margin-auto ">
				<div class="bg-cloud padding10 opacity10 height20"><a class="no-deco dracula-orchid height100 width100 display-block" href="'.utf8_encode(str_replace(' ','-', $index->getName())).'">'.utf8_encode($index->getName()).'</a></div>
				<div class="text-center height80 anim-hover-bigged"><a class="height100 width100 display-block " href="'.$method.'/'.utf8_encode(str_replace(' ','-', $index->getName())).'"><span class=" font-size-larger icon-top-middle '.$index->getIcon().' '.$index->getColor().'"></span></a></div>
		</div>';
}, $req);
echo "</div>";