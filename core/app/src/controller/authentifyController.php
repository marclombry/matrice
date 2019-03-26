<?php
namespace core\app\src\controller;
use core\app\src\model\Authentify;
use core\app\classes\Route;
use core\app\classes\FormFilter;
use core\app\classes\traits\GenerateKey;
use core\app\classes\traits\Hydrate;
class AuthentifyController{

	public static function index()
	{
		Route::Url('/macata');
	}

	public static function Connexion()
	{
		
		if(isset($_POST)){

			$csrf = isset($_SESSION['form']['csrf'])?$_SESSION['form']['csrf']:null;
			// sécure all variable post
			$_POST = array_map('htmlspecialchars', $_POST);
			//import connection in database
			global $database;
			
			// secure variable
			//$pseudo = isset($_POST['pseudo'])? htmlspecialchars($_POST['pseudo']):'';
			$email = isset($_POST['email'])? htmlspecialchars($_POST['email']):'';
			$password = isset($_POST['password'])? htmlspecialchars($_POST['password']) :''; 
			//var_dump($password);
			//$secret = isset($_POST['secret'])? htmlspecialchars($_POST['secret']):'';
			// drop a password in authentify table
			$verifPass = $database->select("SELECT password FROM authentify WHERE email = '$email'",true);
		
			//verify the password in database
			$passVerif = $verifPass ? password_verify($password,$verifPass->password):false;
			//var_dump('pass verif = ',$passVerif);
			
			//verify not double email in database
			/*
			$double = $database->select("SELECT email FROM authentify WHERE email = '$email'");
			if(sizeof($double) <=1)
			{
			*/
				// if it's a good password so i start request for recover informations
				if($passVerif){
					$check = $database->select("SELECT id, email, password, id_group, id_profil FROM authentify WHERE email = '$email' AND password = '$verifPass->password' ",true);
					
				}

				if(!isset($_SESSION['form']))
				{
					$_SESSION['form']['csrf']='';
				}
				
				//if there is a request and is a good request, i instance new Authentify class
				if(isset($check) && !empty($_POST['email']) && $csrf == $_SESSION['form']['csrf']){
					$error='';
					$auth = new Authentify();
					$auth->hydrate($check);
					$auth->connexion();
					return $auth;
					Route::Url('/macata');
				}else{
					$error ='<div class ="display-flex ">
					    <div class="symbol-warning"><span class="title text-ligth symbol-englob">W</span></div>
					    <div class="message-warning text-ligth alert-message">Attention un champs est vide !</div>
					    <div class="symbol-warning cross-close text-ligth text-bold pointer">X</div>
					  </div>';
				}
			/*	
			}else{
				$error.='<div class ="display-flex ">
    						<div class="symbol-error"><span class="title text-ligth symbol-englob">X</span></div>
    						<div class="message-error text-ligth alert-message">Error fatala probleme</div>
    						<div class="symbol-error cross-close text-ligth text-bold pointer" >X</div>
  						</div>';
			}
			*/
		

		}
		
	}

	public static function Deconnexion(){
		session_destroy();
		Route::Url('/macata');
	}

	public static function Register(){
		if(isset($_POST) && !empty($_POST)){
			global $database;
			
			$confirm= !empty($_POST)?FormFilter::input_filter($_POST):false;
			//$confirmPseudo = !empty($_POST['pseudo'])?FormFilter::secure_input_length($_POST['pseudo'], $min=6, $max =255):false;
			$confirmEmail = !empty($_POST['email'])?FormFilter::secure_email($_POST['email']):false;
			$confirmPassword = !empty($_POST['password'])?FormFilter::secure_input_length($_POST['password'], $min=6, $max =255):false;
			//$confirmSecret= !empty($_POST['secret'])?FormFilter::secure_input_length($_POST['secret'], $min=6, $max =255):false;

			if( $confirmEmail ===false || $confirmPassword ===false)
			{
				$error = " une érreur est survenue veuillez recommencer";
				//$error =" une érreur est survenue veuillez recommencer";
				//Route::Url('/macata');
				//$error;
			}

			//verify not double email in database
			$double = $database->select("SELECT COUNT('email') as numberEmail FROM authentify WHERE email = '$confirmEmail'",true);
			$numberEmailFind = intval($double->numberEmail);
			if($numberEmailFind <1 && $confirmEmail &&  $confirmPassword)
			{
				$srt = htmlentities($_POST['email'].','.password_hash($_POST['password'],PASSWORD_DEFAULT).',1');
				$insert = $database->inst('authentify',
					'email,password,id_group',
					':email,:password,:id_group',
					$srt
				);
				echo "Vous ete inscrit";
				self::Connexion();
				$_SESSION['message']['register']='Vous voici inscrit';
				
			}
			/*
			else{
				$error='<div class ="display-flex ">
    						<div class="symbol-error"><span class="title text-ligth symbol-englob">X</span></div>
    						<div class="message-error text-ligth alert-message">Une personne est deja inscrit sous cette adresse mail</div>
    						<div class="symbol-error cross-close text-ligth text-bold pointer" >X</div>
  						</div>';
			}
			*/
			return !empty($error)?false:true;
		}
		
	}
}