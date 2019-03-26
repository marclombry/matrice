<?php
namespace core\app\src\controller;
use core\app\classes\Route;
use core\app\classes\traits\Hydrate;
use \core\app\src\model\Article;
class ArticlesController{
	public static function ListArticle()
	{
		global $database;
		/* drop data for hydrate modules entity */
		
			$articlesList=[];
			$liste_article = $database->select("SELECT id,reference,designation,code,language,gamme,formulation,contenence,volume,density FROM article");
			foreach ($liste_article as $key => $articles) {
				$article = new article();
				$article->hydrate($articles);
				$articlesList[]= $article;
			}
		
			return $articlesList;

		
		
	}
}