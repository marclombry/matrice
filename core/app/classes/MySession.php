<?php
namespace core\app\classes;
class MySession {
	
	public static function Verif_session()
	{
		return (isset($_SESSION) && !empty($_SESSION));
	}
}
