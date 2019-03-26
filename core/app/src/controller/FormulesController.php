<?php
namespace core\app\src\controller;
use core\app\classes\Route;
use core\app\classes\traits\Hydrate;
use \core\app\src\model\Formule;
class FormulesController{
	public static function ListFormule()
	{
		global $database;
		/* drop data for hydrate modules entity */
		
			$formulesList=[];
			$liste_formule = $database->select("SELECT id,code,name,statut FROM formule");
			foreach ($liste_formule as $key => $formules) {
				$formule = new Formule();
				$formule->hydrate($formules);
				$formulesList[]= $formule;
			}
		
			return $formulesList;

		
		
	}
}