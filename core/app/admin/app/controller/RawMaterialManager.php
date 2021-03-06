<?php
namespace core\app\admin\app\controller;
class RawMaterialManager{
	public $db; // Instance de PDO.
	private $post =[];
	private $data =[];
	public function __construct($db)
	{
		$this->setDb($db);
	}

	public function setDb($db)
	{
		$this->db = $db;
	}

	public  function Create($post,$table=null,$field=null){
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
				$insert = $this->db->inst($table,
				$fielder,
				$field,
				$srt
				);
			}catch(Exception $e){
				die('erreur'. $e->getMessage());
			}
		}
	}

	public function Read(){
		return $this->db->select('select * from rawmaterial ORDER BY id ASC');
	}

	public function update($table,$fields,$values,$id) {
		return $this->db->update($table,$fields,$values,$id);
	}

	public function History($auth,$post,$table,$fields,$action='create',$module='rawmaterial'){
		
		$_POST = array_map('htmlspecialchars',$post);
		$dateCreation = htmlentities($_POST['datecreation']);
		$fielder = str_replace(':','',$fields);
		foreach ($_POST as $key => $value) {
			$values = "$auth,$value,$value,$dateCreation,$action,$module";
			if($key != 'datemodification' && $key !='datecreation'){
				$this->db->inst($table,$fielder,$fields,$values);
			}
			
			
		}
		
	}
	

}