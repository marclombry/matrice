<?php
namespace core\app\src\model;
use core\app\classes\traits\Hydrate;
class Formule {
use Hydrate;
	private $id;
	private $code;
	private $name;
	private $statut;

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

	public function setCode($code)
	{
		$this->code = $code;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setStatut($statut)
	{
		$this->statut = $statut;
	}

	

	/* getter */
	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getCode()
	{
		return $this->code;
	}

	public function getStatut()
	{
		return $this->statut;
	}
	

}