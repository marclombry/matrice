<?php
namespace core\database;
class Query{

	private $action;

	private $field;

	private $from;

	private $where; 

	private $group;

	private $order;

	private $limit;

	private $pdo;

	private $params;

	private $tab = [];

	private $query;

	private $and;

	private $in;

	private $not;

	private $paginate;

	private $beetween;

	private $like;
	/**
	 * [$or description]
	 * @var [type]
	 */
	private $or;

	public function __construct($pdo =null)
	{
		$this->pdo = $pdo;
	}
	/**
	 * [from description]
	 * @param  [string] $table [table names]
	 * @return [instance]        [description]
	 */
	public function from($table) 
	{
		$this->from = $table;
		return $this;
	}

	public function count()
	{
		$this->field("COUNT(id)");
		return $this->execute()->fetchColumn();

	}
	/**
	 * [params description]
	 * @param  [string] $params [parameter for prepare request]
	 * @return [instance]         [description]
	 */
	public function params($params)
	{
		$this->params = $params;
		return $this;
	}
	/**
	 * [action description]
	 * @param  [string] $action [action for sql request like select or insert etc...]
	 * @return [instance]         [description]
	 */
	public function action($action)
	{
		$this->action =  $action;
		return $this; 
	}
	/**
	 * [field description]
	 * @param  array  $fields [fields for sql request]
	 * @return [type]         [description]
	 */
	public function field($fields =['*']) 
	{
		$this->field = is_array($fields)? $fields : func_get_args();
		return $this;
	}
	/**
	 * [where description]
	 * @param  [string] $condition [where sql]
	 * @return [type]            [description]
	 */
	public function where($condition) 
	{
		$this->where = $condition;
		return $this;
	}
	/**
	 * [and description]
	 * @param  [type] $and [and sql]
	 * @return [type]      [description]
	 */
	public function and($and) 
	{
		$this->and = $and;
		return $this;
	}
	/**
	 * [in description]
	 * @param  [type] $in [in sql]
	 * @return [type]     [description]
	 */
	public function in($in) 
	{
		$this->in = $in;
		return $this;
	}
	/**
	 * [like description]
	 * @param  [type] $like [like sql]
	 * @return [type]       [description]
	 */
	public function like($like) 
	{
		$this->like = $like;
		return $this;
	}
	/**
	 * [groupBY description]
	 * @param  [type] $group [group by sql]
	 * @return [type]        [description]
	 */
	public function groupBY($group) 
	{
		$this->group = $group;
		return $this;
	}
	/**
	 * [not description]
	 * @param  [type] $not [not sql]
	 * @return [type]      [description]
	 */
	public function not($not) 
	{
		$this->not = $not;
		return $this;
	}
	/**
	 * [paginate description]
	 * @param  [type] $paginate [for create paginate]
	 * @return [type]           [description]
	 */
	public function paginate($paginate) 
	{
		$this->paginate = $paginate;
		return $this;
	}
	/**
	 * [limit description]
	 * @param  [type] $limit [limit sql]
	 * @return [type]        [description]
	 */
	public function limit($limit) 
	{
		$this->limit = $limit;
		return $this;
	}

	/**
	 * [beetween description]
	 * @param  [type] $beetween [beetween sql]
	 * @return [type]           [description]
	 */
	public function beetween($beetween) 
	{
		$this->beetween = $beetween;
		return $this;
	}
	/**
	 * [orderBy description]
	 * @param  [type] $order [order by]
	 * @return [type]        [description]
	 */
	public function orderBy($order) 
	{
		$this->order = $order;
		return $this;
	}
	/**
	 * [createQuery get all the attributes of the request and return a string]
	 * @return [type] [string]
	 */
	public function createQuery()
	{
		$this->tab[] = $this->action;
		$this->tab[] = !is_array($this->field) ? $this->field : join(', ',$this->field);
		$this->tab[] = ' FROM '.$this->from;
		if(!empty($this->where)){$this->tab[] = 'WHERE '.$this->where;}
		if(!empty($this->and)){$this->tab[] = 'AND '.$this->and;}
		if(!empty($this->or)){$this->tab[] = 'OR '.$this->or;}
		if(!empty($this->in)){$this->tab[] = 'IN '.$this->in;}
		if(!empty($this->beetween)){$this->tab[] = 'BEETWEEN '.$this->beetween;}
		if(!empty($this->not)){$this->tab[] = 'NOT '.$this->not;}
		if(!empty($this->like)){$this->tab[] = 'LIKE '.$this->like;}
		if(!empty($this->order)){$this->tab[] = 'ORDER BY '.$this->order;}
		return join(" ",$this->tab);
	}
	/**
	 * [execQuery execute request]
	 * @param  boolean $one [description]
	 * @return [type]       [description]
	 */
	public function execQuery($one=true)
	{
		if($this->tab) {
			//$statement =  $this->pdo->prepare($query);
			//$statement->execute($this->params);
			$this->query = join(' ',$this->tab);
			$req = $this->pdo->query($this->query);	
			return $one ? $req->fetch(): $req->fetchAll();
			 
		} 
			
	}
	/**
	 * [prepQuery execute request prepare]
	 * @param  [type]  $params [description]
	 * @param  boolean $one    [description]
	 * @return [type]          [description]
	 */
	public function prepQuery($params,$one=true)
	{
		if($this->tab) {
			$this->query = join(' ',$this->tab);
			$req = $this->pdo->prepare($this->query);
			if(is_array($params))
			{
				foreach($params as $k =>$v)
				{
					$req->bindParam($k,$v);
				}
			}else{
				$this->params = $params;
				$req->bindParam(':id',$this->params);
			}
			
			$req->execute();
			return $one?$req->fetch():$req->fetchAll();
		} 
			
	}


}