<?php
namespace core\app\src\model;
class Profil {

	private $id;
	private $picture;
	private $adresse;
	private $cp;
	private $city;
	private $phone;
	private $id_user;

	public function __construct($valeur = array()){
		if(!empty($valeur))
		{
			$this->hydrate($valeur);
		}
	}
	public function hydrate($donnee){
		if(!empty($donnee)){
			foreach ($donnee as $key => $value) {
				$methode = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
	                 
	            if (is_callable(array($this, $methode)))
	            {
	                $this->$methode($value);
	            }
				
			}
		}
	}
	/*setter*/
	public function setId($id)
	{
		$this->id = $id;
	}

	public function setPicture($picture)
	{
		$this->picture = $picture;
	}

	public function setAdresse($adresse)
	{
		$this->adresse = $adresse;
	}

	public function setCp($cp)
	{
		$this->cp = $cp;
	}

	public function setCity($city)
	{
		$this->city = $city;
	}

	public function setPhone($phone)
	{
		$this->phone = $phone;
	}

	public function setId_user($id_user)
	{
		$this->id_user = $id_user;
	}

	/* getter */
	public function getId()
	{
		return $this->id;
	}

	public function getPicture()
	{
		return $this->picture;
	}

	public function getAdresse()
	{
		return $this->adresse;
	}

	public function getCp()
	{
		return $this->cp;
	}

	public function getCity()
	{
		return $this->city;
	}

	public function getPhone()
	{
		return $this->phone;
	}

	public function getId_user()
	{
		return $this->id_user;
	}

	

}