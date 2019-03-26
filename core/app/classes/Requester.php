<?php
namespace core\app\classes;
class Requester {
	
	public static function Uri(){
		return $_SERVER['REQUEST_URI'];
	}
	public static function Method(){
		return $_SERVER['REQUEST_METHOD'];
	}
	public static function Http_host(){
		return $_SERVER['HTTP_HOST'];
	}
	public static function Content_type(){
		return $_SERVER['CONTENT_TYPE'];
	}
	public static function Script_name(){
		return $_SERVER['SCRIPT_NAME'];
	}
	public static function Php_self(){
		return $_SERVER['PHP_SELF'];
	}
	public static function Request(){
		return $_REQUEST;
	}
}