<?php
namespace core\app\classes\traits;
trait GenerateKey
{
	public function randKeyInt($keylength)
	{
		return isset($keylength) && $keylength > 0 
		? intval(str_repeat(mt_rand(0,9), $keylength))
		:str_shuffle(uniqid());
	}
}