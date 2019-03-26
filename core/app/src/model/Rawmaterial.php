<?php
namespace core\app\src\model;
use core\app\classes\traits\Hydrate;
class RawMaterial {
	use Hydrate;
	private $id;
	private $designation;
	private $unitPrice;
	private $dateModification;
	private $dateCreation;

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

	public function setUnitprice($unitPrice)
	{
		$this->unitPrice = $unitPrice;
	}

	public function setDateModification($dateModification)
	{
		$this->dateModification = $dateModification;
	}

	public function setDateCreation($dateCreation)
	{
		$this->dateCreation = $dateCreation;
	}

	

	/* getter */
	public function getId()
	{
		return $this->id;
	}

	public function getDesignation()
	{
		return $this->designation;
	}

	public function getUnitprice()
	{
		return $this->unitPrice;
	}

	public function getDateModification()
	{
		return $this->dateModification;
	}
	
	public function getDateCreation()
	{
		return $this->dateCreation;
	}

}