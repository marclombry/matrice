<?php
namespace core\app\src\controller;
use core\app\classes\Route;
use core\app\classes\traits\Hydrate;
use \core\app\src\model\RawMaterial;
class RawMaterialController{
	public static function ListMaterial($order=null)
	{
		global $database;
		/* drop data for hydrate modules entity */
		
			$matieresList=[];
			$liste_matiere = $database->select("SELECT id, designation, unitprice, datemodification, datecreation FROM rawmaterial $order");
			foreach ($liste_matiere as $key => $matieres) {
				$matiere = new rawMaterial();
				$matiere->hydrate($matieres);
				$matieresList[]= $matiere;
			}
			return $matieresList;
	}
}