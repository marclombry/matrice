<?php
namespace core\app\admin\app\controller;
class AdminController{
	private static $isadmin;

	public static function Create($post,$table=null,$field=null){
		global $database;
		$srt='';
		if(isset($_POST)){
			$_POST = array_map('htmlspecialchars',$post);
			$fielder = str_replace(':','',$field);
			//var_dump($database->select("SELECT * FROM $table"));
			foreach ($_POST as $key =>$fields) {
				if($key !='csrf' || $key !='ajoutez')
				{
				$srt .= "$fields,";
				}
			}
			//delete the last one ,
			$srt = substr($srt, 0,-1);
			try
			{
				$insert = $database->inst($table,
				$fielder,
				$field,
				$srt
				);
			}catch(Exception $e){
				die('erreur'. $e->getMessage());
			}
		}
	}

	public static function Delete($id,$table){
		global $database;
		if(isset($_GET['id'])){
			$id = htmlspecialchars($_GET['id']);
			$database->delt($table,$id);
		}
	}

	public static function Read($sql){
		global $database;
		return $database->select($sql)->fetch();
	}


	public function update($table,$fields,$values,$id) {
		global $database;
		return $database->update($table,$fields,$values,$id);
	}

	public static function Save(){

	}

	public static function getIsadmin() {
		return self::$isadmin;
	}

	public static function setIsadmin($bool) {
		self::$isadmin = $bool;
	}

	public static function History($auth,$get,$table,$fields,$action='suprime',$module='article'){
		global $database;
		$id = htmlspecialchars($_GET[id]);
		//$dateCreation = htmlentities($_POST['datecreation']);
		$fielder = str_replace(':','',$fields);
		$dateCreation = date('Y-m-d');
		$values = "$auth,$id,$id,$dateCreation,$action,$module";
		$database->inst($table,$fielder,$fields,$values);
		
		
		
	}

}
