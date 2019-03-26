<?php
namespace core\app\src\controller;
use core\app\classes\Route;
use core\app\classes\traits\Hydrate;
use \core\app\src\model\packagings;
class PackagingsController{
	public static function ListPackagings()
	{
		global $database;
		/* drop data for hydrate modules entity */
		
			$packagingsList=[];
			$liste_packagings = $database->select("SELECT id,reference,visuel,cost,transportcost FROM packaging");
			foreach ($liste_packagings as $key => $packaging) {
				$packagings = new packagings();

				$packagings->hydrate($packaging);

				$packagingsList[]= $packagings;
			}
		
			return $packagingsList;	
	}
}