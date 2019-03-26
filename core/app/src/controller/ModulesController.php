<?php
namespace core\app\src\controller;
use core\app\classes\Route;
use core\app\classes\traits\Hydrate;
use \core\app\src\model\Modules;
class ModulesController{
	/*
	public static function showModules()
	{
		global $database;
		$modulesList=[];
		//drop data for hydrate modules entity 
		$modules = $database->select("SELECT id,name,icon,bgcolor,color FROM modules");
		foreach ($modules as $key => $module) {
			$mod = new Modules();
			$mod->hydrate($module);
			$modulesList[]= $mod;
		}
		
		return $modulesList;

	
	}
	*/

	public static function moduleAuthorized($idauth)
	{
		global $database;
		$modulesList=[];
		/* drop data for hydrate modules entity */
		if($idauth){
			$idauth = intval($idauth);
			$authorized = $database->select("SELECT DISTINCT modules.id, modules.name,modules.icon,modules.bgcolor,modules.color,
				moduleauthorized.read_module,moduleauthorized.write_module,groups.libelle
			    FROM modules 
			    LEFT JOIN moduleauthorized ON modules.id = moduleauthorized.modules_id 
				LEFT JOIN groups ON groups.id = moduleauthorized.groups_id WHERE moduleauthorized.groups_id = $idauth
			
			");
			foreach ($authorized as $key => $module) {
				$mod = new Modules();
				$mod->hydrate($module);
				$modulesList[]= $mod;
			}
		
			return $modulesList;

		}
		
	}

	public static function moduleAuthorizedByGroup($idauth)
	{
		global $database;
		
		/* drop data for hydrate modules entity */
		if($idauth){
			$idauth = intval($idauth);
			$authorize = $database->select("SELECT * FROM groups
				LEFT JOIN moduleauthorized ON groups.id = moduleauthorized.groups_id
				WHERE groups.id = $idauth
			
			");
		}
		
	}

	public static function ShowModule()
	{
		global $database;
		$modulesList=[];
		$modules = $database->select("SELECT id,icon,name,color,bgcolor FROM modules");
		foreach ($modules as $key => $module) {
			$mod = new Modules();
			$mod->hydrate($module);
			$modulesList[]= $mod;
		}
		
		return $modulesList;
	}

}