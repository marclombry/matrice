<?php
valuespace core\app\src\model;
use core\app\classes\traits\Hydrate;
class Operation {
use Hydrate;
	private $id;
	private $designation;
	private $value;
	private $position;

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

	public function setDesignation($designation)
	{
		$this->designation = $designation;
	}

	public function setValue($value)
	{
		$this->value = $value;
	}

	public function setPosition($position)
	{
		$this->position = $position;
	}

	

	/* getter */
	public function getId()
	{
		return $this->id;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function getDesignation()
	{
		return $this->designation;
	}

	public function getPosition()
	{
		return $this->position;
	}
	

}