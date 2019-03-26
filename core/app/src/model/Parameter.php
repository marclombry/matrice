<?php
namespace core\app\src\model;
use core\app\classes\traits\Hydrate;
class parameter {
	use Hydrate;
	private $id;
	private $hourlyCost;


	public function __construct($valeur = array()){
		if(!empty($valeur))
		{
			self::hydrate($valeur);
		}
	}
	/*setter*/
	public function setId($id)
	{
		$this->id = $id;
	}

	public function setHourlyCost($hourlyCost)
	{
		$this->hourlyCost = $hourlyCost;
	}

	/* getter */
	public function getId()
	{
		return $this->id;
	}

	public function getHourlyCost()
	{
		return $this->hourlyCost;
	}
	

}