<?php
namespace core\app\classes;
class Route{
	/**
	 * [send to the page switch to parameter]
	 * @param  [string] $get   [name of the send page]
	 * @param  string $param [parameter of url]
	 * @param  string $value [values of parameter url]
	 * @return [type]        [return to the page ]
	 */
	public static function Url($get,$param='',$value=''){
		return !empty($param) && !empty($value)? header('location:'.$get.'?'.$param.'='.$value): header('location:'.$get);
	}

	/**
	 * [retrieve information passed by the get variable]
	 * @return [array] [array containing data]
	 */
	public static function get(){
		if(isset($_GET)){
			return array_map('htmlspecialchars',($_GET));
		}
	}

	/**
	 * retrieve information passed by the post variable
	 * @return [array] [array containing data]
	 */
	public static function post(){
		if(isset($_POST)){
			return array_map('htmlspecialchars',($_POST));
		}
	} 

}