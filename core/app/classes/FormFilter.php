<?php
namespace core\app\classes;
class FormFilter{
	
	public static function input_filter($post)
	{
		return !empty($post)? array_map("self::secure_input", $post):null;
	}

	public static function secure_input($data)
	{
		$data = addcslashes($data, '%');
		$data = htmlspecialchars($data);
		return !empty($data) && !intval($data)? htmlspecialchars($data):intval($data);
	}

	public static function secure_input_length($input, $min=6, $max =255)
	{
		return strlen($input) >= $min && strlen($input) <=$max;
	}

	public static function secure_email($email)
	{
		return filter_var($email,FILTER_VALIDATE_EMAIL);
	}

	public static function error_message()
	{
		$error='';
		if(isset($_POST)){
			// if $_POST is empty
			foreach ($_POST as $key => $value) {
				if($_POST[$key] ==''){
					$error .= 
					'<div class ="display-flex ">
						<div class="symbol-warning"><span class="title text-ligth symbol-englob">W</span></div>
						<div class="message-warning text-ligth alert-message">Attention un champs est vide !</div>
						<div class="symbol-warning cross-close text-ligth text-bold pointer">X</div>
					</div>';
				}


			}
			if(isset($_POST["password"]) && sizeof($_POST["password"])<6){
					$error .= 
					'<div class ="display-flex ">
						<div class="symbol-warning"><span class="title text-ligth symbol-englob">W</span></div>
						<div class="message-warning text-ligth alert-message">Attention un champs est trop petit !</div>
						<div class="symbol-warning cross-close text-ligth text-bold pointer">X</div>
					</div>';
			}

			
		}

		return $error;
	}


}