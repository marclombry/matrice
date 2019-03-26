<?php
namespace core\app\src\model;
use core\app\classes\traits\Hydrate;
class Traceability {
	use Hydrate;
	private $id;
	private $username;
	private $oldValue;
	private $newValue;
	private $dateTraceability;

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

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function setOldValue($oldvalue)
	{
		$this->oldValue = $oldValue;
	}

	public function setNewValue($newvalue)
	{
		$this->newValue = $newValue;
	}

	public function setDateTraceability($dateTraceability)
	{
		$this->dateTraceability = $dateTraceability;
	}

	

	/* getter */
	public function getId()
	{
		return $this->id;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function getOld_value()
	{
		return $this->old_value;
	}

	public function getNew_value()
	{
		return $this->new_value;
	}

	public function getDateTraceability()
	{
		return $this->dateTraceability;
	}
	

}