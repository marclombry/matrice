<?php
namespace core\app\classes;
class Html{
	/**
	 * [Tag return a tag html
	 * @param [string] $tag     [description]
	 * @param string $content [description]
	 */
	public static function Tag($tag,$content=''){
		return "<$tag>$content</$tag>";
	}

	/**
	 * [Img description]
	 * @param [string] $src   [url of the image source]
	 * @param string $alt   [tag alt of image]
	 * @param string $title [title of image]
	 */

	public static function Img($src,$alt='',$title=''){
		return "<img src=$src alt=$alt title=$title>";
	}

	/**
	 * generate html tag ul, li
	 * @param [string] $data [array or string for generate list]
	 * @param string $type [ol or ul]
	 */
	public static function Liste($data,$type='ul'){
		$list ="<$type>";
		if(is_array($data)){
			foreach ($data as $v) {
				$list.='<li>'.$v.'</li>';
			}
			
		}else{
			$list.="<li>$data</li>";
		}

		$list.="</$type>";	
		return $list;
	}

	/**
	 * [Table tag]
	 * @param array $th [generate header of tag table]
	 * @param array $td [generate body od tag table]
	 */
	public static function Table($th=[],$td=[]){
		$table='<table>';
			if(!empty($th)){
				$table.='<tr>';
					foreach ($th as $k => $v) {
						$table.='<th>'.$v.'</th>';
					}
				$table.='</tr>';
			}
			if(!empty($td)){
				$table.='<tr>';
					foreach ($td as $k => $v) {
						$table.='<td>'.$v.'</td>';
					}
				$table.='</tr>';
			}
			
		$table.='</table>';
		return $table;
	}

	/**
	 * [Article tag generated]
	 * @param [string] $title   [description]
	 * @param [string] $content [description]
	 */
	public static function Article($title,$content){
		return "<h2>$title</h2><p>$content</p>";
	}

	/**
	 * [Footer description]
	 * @param [type] $content [description]
	 */
	public static function Footer($content){
		return "<footer>$content</footer>";
	}

	/**
	 * [A tag ]
	 * @param [type] $href  [url of tag a ]
	 * @param string $link  [link ]
	 * @param string $title [description]
	 */
	public static function A($href,$link='',$title='',$blank=true){
		return ($blank)?"<a href=$href title=$title rel='noopener'>$link</a>": "<a href=$href title=$title target='_BLANK' rel='noopener'>$link</a>";
	}

	/**
	 * [Paginate description]
	 */
	public static function Paginate(){

	}

	public static function Video($width='',$height='',$controls='',$src='',$type='',$poster='',$source=''){
		return "<video width=$width controls poster=$poster><source src=$src type=$type></video>";
	}

	public static function Audio($control,$src,$type=''){
		return "<audio controls=$control><source src=$src type=$type> Votre navigateur ne prend pas en charge l'élément <code>audio</code>.</audio>";
	} 
	
}