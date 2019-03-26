<?php
codespace core\app\src\model;
use core\app\classes\traits\Hydrate;
class Bred {
use Hydrate;
	private $id;
	private $hourlyCost;
	private $code;
	private $quantity;
	private $mixed;
	private $specificPreparation;
	private $filtering;
	private $washingFilter;
	private $washingTank;
	private $startingTank;
	

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

	public function setCode($code)
	{
		$this->code = $code;
	}

	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;
	}
	
	public function setMixed($mixed)
	{
		$this->mixed = $mixed;
	}

	public function setSpecificPreparation($specificPreparation)
	{
		$this->specificPreparation = $specificPreparation;
	}

	public function setFiltering($filtering)
	{
		$this->filtering = $filtering;
	}

	public function setWashingFilter($washingFilter)
	{
		$this->washingFilter = $washingFilter;
	}

	public function setWashingTank($washingTank)
	{
		$this->washingTank = $washingTank;
	}

	public function setStartingTank($startingTank)
	{
		$this->startingTank = $startingTank;
	}
	/* getter */
	public function getId()
	{
		return $this->id;
	}

	public function getCode()
	{
		return $this->code;
	}

	public function getHourlyCost()
	{
		return $this->hourlyCost;
	}

	public function getQuantity()
	{
		return $this->quantity;
	}
	public function setMixed($mixed)
	{
		$this->mixed = $mixed;
	}

	public function getSpecificPreparation()
	{
		return $this->specificPreparation;
	}

	public function getFiltering()
	{
		return $this->filtering;
	}

	public function getWashingFilter()
	{
		return $this->washingFilter;
	}

	public function getWashingTank()
	{
		return $this->washingTank;
	}

	public function getStartingTank()
	{
		return $this->startingTank;
	}

	
	

}