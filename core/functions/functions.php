<?php
/* utility function*/

//return float with decimal choice by parameter //
function converse_to_float($converse,$decimal=2){
	return floatval(number_format($converse,$decimal));
}
// return quantity * price //
function calcul_cost_pound($quantity,$price){
	return $quantity * $price;
}
// return result function divised by quntity
function cost_per_liter($callback,$quantity){
	return $callback / $quantity ;
}
// replace character
function replaceChar($text) {
	$utf8 = array(
	'/[áàâãªä]/u' => 'a',
	'/[ÁÀÂÃÄ]/u' => 'A',
	'/[ÍÌÎÏ]/u' => 'I',
	'/[íìîï]/u' => 'i',
	'/[éèêë]/u' => 'e',
	'/[ÉÈÊË]/u' => 'E',
	'/[óòôõºö]/u' => 'o',
	'/[ÓÒÔÕÖ]/u' => 'O',
	'/[úùûü]/u' => 'u',
	'/[ÚÙÛÜ]/u' => 'U',
	'/ç/' => 'c',
	'/Ç/' => 'C',
	'/ñ/' => 'n',
	'/Ñ/' => 'N',
	"/['`]/u" => ' ',
	);
	return preg_replace(array_keys($utf8), array_values($utf8), $text);
}