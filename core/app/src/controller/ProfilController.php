<?php
namespace core\app\src\controller;
use core\app\src\model\Authentify;
use core\app\src\model\Profil;
use core\app\classes\Route;
use core\app\classes\FormFilter;
use core\app\classes\Form;
use core\app\classes\Dropfile;
class ProfilController{
 //import connection in database
	

	public function showProfil($auth)
	{
		global $database;
		return $database->select("SELECT profil.picture, profil.firstname,profil.lastname,profil.adresse, profil.cp, profil.city, profil.phone FROM profil 
			LEFT JOIN authentify
			ON authentify.id = profil.id WHERE authentify.id=$auth[id]
			",true);	
	}

	public function updateProfil($post,$auth)
	{
		if(isset($_POST)){
			//$post = FormFilter::input_filter($post);
			$post = array_map('htmlspecialchars', $_POST);
			unset($post['addinfo']);
			$post['id'] = $auth['id'];
			//var_dump($_FILES);
			global $database;
			//$database->update('profil','firstname',$post['firstname'],$auth['id']);
			$sql = "UPDATE profil SET lastname = :lastname, firstname = :firstname, adresse = :adresse, cp = :cp, city = :city, phone = :phone WHERE id=:id";
			if(!empty($post['lastname']) && !empty($post['firstname']) && !empty($post['adresse']) && !empty($post['cp']) && !empty($post['city']) && !empty($post['phone']))
			{
				$database->updateAll($sql,$post);
			}

			if(isset($_FILES))
			{
				
				$uploadAvatar = new Dropfile('images/','../public/images','jpeg');
				if($uploadAvatar->check('picture')){
					//var_dump($uploadAvatar->check('picture'));
					$database->update('profil','picture',$uploadAvatar->check('picture'),$post['id']);
				}	
			}
		}		
	}
}