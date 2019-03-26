<?php
namespace core\app\classes;
class Emailer{


public static $header;
public static $message;
public static $to;
public static $subject;




   public static function Mailer($to,$subject,$message,$header){
   		mail($to,$subject, $message, "From:" . $header);
   }
}