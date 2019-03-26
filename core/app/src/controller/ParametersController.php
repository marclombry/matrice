<?php
namespace core\app\src\controller;
use core\app\classes\Route;
use core\app\classes\traits\Hydrate;
use \core\app\src\model\Parameter;
class ParametersController{
	public static function ListParameters()
	{
		global $database;
		/* drop data for hydrate modules entity */
		
			$parametersList=[];
			$liste_parameters = $database->select("SELECT id, hourlyCost  FROM parameter");
			foreach ($liste_parameters as $key => $parameter) {
				$parameters = new Parameter();
				$parameters->hydrate($parameter);
				$parametersList[]= $parameters;
			}
			return $parametersList;
	}
}