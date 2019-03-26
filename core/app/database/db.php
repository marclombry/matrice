<?php
class DB{
	//@var array environnement for database connexion
	public $config = [
	'db_host'=>'localhost',
	'db_name'=>'macata',
	'db_user'=>'root',
	'db_pass'=>''
	];

	public $table='';
	/**
	 * [$PDOinstance is a variable for create instance of PDO]
	 * @var null
	 */
	protected $PDOinstance =null;

	/**
	 * [$instance is static variable of creation pdo]
	 * @var null
	 */
	private static $instance = null;

	/**
	 * [_constructor for instanciate the database connexion]
	 * @param [null by default ,maybe it's possible to passed a array in the place of this viariable ] $config []
	 */
	public function __construct($config=null){
		if(empty($config)){
			$this->PDOinstance = new PDO('mysql:host='.$this->config['db_host'].';dbname='.$this->config['db_name'],$this->config['db_user'],$this->config['db_pass']);
		}else{
			$this->PDOinstance = new PDO('mysql:host='.$config['db_host'].';dbname='.$config['db_name'],$config['db_user'],$config['db_pass']);
		}
		
			
	}

	/**
	 * [getInstance instance pdo]
	 * @return [a Instance pdo ] [description]
	 */
	public static function getInstance(){
		if(is_null(self::$instance)){
			self::$instance = new DB();
		}
		return self::$instance;
	}

	/**
	 * [qry execute a query and show the result]
	 * @param  [string]  $query [it's an sql query]
	 * @param  boolean $one   [if this boolean is true so return one result else returned all result finded]
	 * @return [type]         [query ansd result]
	 */
	public function qry($query,$one=true){
		if(!$query){
			throw new Exception("Error Processing Request", 1);
		}
		return $one ? $this->PDOinstance->query($query)->fetch() : $this->PDOinstance->query($query)->fetchAll();
	}

	/**
	 * [slct execute an select query and return all result or one result]
	 * @param  [string]  $param [select the parameters that have it in our query]
	 * @param  [string]  $table [table name]
	 * @param  boolean $one   [if this boolean is true so return one result else returned all result finded]
	 * @return [type]         [query ansd result]
	 */
	public function slct($param,$table,$one=true){
		return $one ? $this->PDOinstance->query("SELECT $param FROM $table")->fetch(PDO::FETCH_OBJ) : $this->PDOinstance->query("SELECT $param FROM $table")->fetchAll(PDO::FETCH_OBJ);
	}

	/**
	 * query insertion in database
	 * @param  [string] $table  table name
	 * @param  [string] $fields [expected format : 'nom,prenom,ect']
	 * @param  [string] $values [expected format : ':nom,:prenom,:ect']
	 * @param  [string] $data   [expected format : 'nom,prenom,ect']
	 * @return [type]         [description]
	 */
	public function inst($table,$fields,$values,$data){
		$val = explode(',',$values);
		$dat = explode(',',$data);
		$stmt = $this->PDOinstance->prepare("INSERT INTO $table ($fields) VALUES ($values)");
		foreach ($val as $k => $v) {
			$stmt->bindParam($v,$dat[$k]);
		}
		
		$stmt->execute();

	}

	/**
	 * [updt update field]
	 * @param  [type] $table  [table name]
	 * @param  [type] $fields [fields name]
	 * @param  [type] $values [values want added]
	 * @param  [type] $id     [id]
	 * @return [type]         [description]
	 */
	public function updt($table,$fields,$values,$id){
		$stmt = $this->PDOinstance->prepare("UPDATE $table SET $fields = :$fields WHERE id=:id");
		$stmt->bindParam(':'.$fields,$values);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
	}

	/**
	 * [delt delete all fields where id equals this id in settings]
	 * @param  [string] $table [table name]
	 * @param  [string] $id    [id]
	 * @return [type]        [execute a delete query]
	 */
	public function delt($table,$id){
		$stmt = $this->PDOinstance->prepare("DELETE FROM $table WHERE id=:id");
		$stmt->bindParam(':id',$id);
		$stmt->execute();
	}
	/**
	 * [all description]
	 * @param  [type] $field [description]
	 * @param  [type] $table [description]
	 * @return [type]        [description]
	 */
	public function all($field,$table){
		return $this->PDOinstance->query("SELECT $field FROM $table")->fetchAll();
	}
	/**
	 * [select description]
	 * @param  [type] $query [description]
	 * @param  [type] $one   [description]
	 * @return [type]        [description]
	 */
	public function select($query,$one=null){
		if($one){
			return $this->PDOinstance->query($query)->fetch(PDO::FETCH_OBJ);
		}
		return $this->PDOinstance->query($query)->fetchAll(PDO::FETCH_OBJ);
	}
	/**
	 * [insert description]
	 * @param  [type] $table [description]
	 * @param  [type] $field [description]
	 * @param  [type] $value [description]
	 * @return [type]        [description]
	 */
	public function insert($table,$field,$value){
		$q = $this->PDOinstance->prepare("INSERT INTO $table ($field) VALUES ($value)");
		$q->execute(array($value));
	}

	//"SELECT * FROM table where field = ?"//
	public function selprep($sql,$data,$one=null){
		//htmlspecialchars($data);
		if($one){
			$q = $this->PDOinstance->prepare($sql);
			$q->execute(array($data));
			$result = $q->fetch(PDO::FETCH_OBJ);
		}
		$q = $this->PDOinstance->prepare($sql);
		$q->execute(array($data));
		$result = $q->fetchAll(PDO::FETCH_OBJ);
		return $result;
	}

	public function update($table,$fields,$values,$id){
		$stmt = $this->PDOinstance->prepare("UPDATE $table SET $fields = :$fields WHERE id=:id");
		$stmt->bindValue(':'.$fields,$values);
		$stmt->bindValue(':id',$id);
		$stmt->execute();
	}

	public function updateAll($sql,$data){
		$stmt = $this->PDOinstance->prepare($sql);
		$stmt->execute($data);
	}
	// query not prepare //
	public function qryUpdate($table,$fields,$values,$id){
		$stmt = $this->PDOinstance->prepare("UPDATE $table SET $fields = '$values' WHERE id='$id'");
		$stmt->execute();
	}
	public function countRow($sql){
		return $this->PDOinstance->query($sql)->rowCount();
	}

	
}