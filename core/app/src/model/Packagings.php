<?php
namespace core\app\src\model;
use core\app\classes\traits\Hydrate;
class packagings {
	use Hydrate;
	private $id;
	private $reference;
	private $visuel;
	private $cost;
	private $transportcost;

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

	public function setReference($reference)
	{
		$this->reference = $reference;
	}

	public function setVisuel($visuel)
	{
		$this->visuel = $visuel;
	}

	public function setCost($cost)
	{
		$this->cost = $cost;
	}

	public function setTransportcost($transportcost)
	{
		$this->transportcost = $transportcost;
	}

	

	/* getter */
	public function getId()
	{
		return $this->id;
	}

	public function getReference()
	{
		return $this->reference;
	}

	public function getVisuel()
	{
		return $this->visuel;
	}

	public function getCost()
	{
		return $this->cost;
	}
	
		public function getTransportcost()
	{
		return $this->transportcost;
	}

}