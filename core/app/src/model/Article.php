<?php
namespace core\app\src\model;
use core\app\classes\traits\Hydrate;
class Article {
use Hydrate;
	private $id;
	private $reference;
	private $designation;
	private $code;
	private $language;
	private $gamme;
	private $formulation;
	private $contenence;
	private $volume;
	private $density;

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

	public function setCode($code)
	{
		$this->code = $code;
	}

	public function setLanguage($language)
	{
		$this->language = $language;
	}
	public function setGamme($gamme)
	{
		$this->gamme = $gamme;
	}
	public function setFormulation($formulation)
	{
		$this->formulation = $formulation;
	}
	public function setContenence($contenence)
	{
		$this->contenence = $contenence;
	}
	public function setVolume($volume)
	{
		$this->volume = $volume;
	}
	public function setDesignation($density)
	{
		$this->density = $density;
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


	public function getLanguage()
	{
		return $this->language;
	}
	public function getGamme()
	{
		return $this->gamme;
	}
	public function getFormulation()
	{
		return $this->formulation;
	}
	public function getContenence()
	{
		return $this->contenence;
	}
	public function getVolume()
	{
		return $this->volume;
	}
	public function getDesignation()
	{
		return $this->density;
	}
	

}