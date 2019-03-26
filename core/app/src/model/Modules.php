<?php
namespace core\app\src\model;
use core\app\classes\traits\Hydrate;
use \core\app\src\model\Modules;
class Modules{
	use Hydrate;
	private $id;
	private $name;
	private $icon;
	private $bgcolor;


	public function __construct($valeur = array()){
		if(!empty($valeur))
		{
			self::hydrate($valeur);
		}
	}


	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function setName($name)
	{
		$this->name = $name;
	}
	public function setIcon($icon)
	{
		$this->icon = $icon;
	}
	public function setBgcolor($bgcolor)
	{
		$this->bgcolor = $bgcolor;
	}
	public function setColor($color)
	{
		$this->color = $color;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}
	public function getIcon()
	{
		return $this->icon;
	}
	public function getBgcolor()
	{
		return $this->bgcolor;
	}
	public function getColor()
	{
		return $this->color;
	}
	


}