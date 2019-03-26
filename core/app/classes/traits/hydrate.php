<?php
namespace core\app\classes\traits;
trait Hydrate
{
	/**
	 * [hydrate description]
	 * @param  {[array]} $donnee ['key'=>'value']
	 * @return {[object]}         [return object with data]
	 */
	public function hydrate($donnee){
		if(!empty($donnee)){
			foreach ($donnee as $key => $value) {
				$methode = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
	                 
	            if (is_callable(array($this, $methode)))
	            {
	                $this->$methode($value);
	            }
				
			}
		}
	}

}