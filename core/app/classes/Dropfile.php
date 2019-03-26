<?php
namespace core\app\classes;
class Dropfile {
	public $target_dir = "uploads/";
	public $target_file;
	//public $target_file = $this->target_dir . basename($_FILES["up"]["name"]);
	public $uploadOk = 1;
	//public $imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
	public $imageFileType;
	public $name;
	public $error;

	public function __construct($target_dir,$target_file,$imageFileType){
		$this->target_dir = $target_dir;
		$this->target_file = $target_file;
		$this->imageFileType = $imageFileType;
	}

	// Check if image file is a actual image or fake image
	public function Check($nameFile='picture'){
		if(isset($_FILES[$nameFile]))
		{
			/*
			$check = getimagesize($_FILES[$nameFile]["tmp_name"]);
		    if($check !== false) {
		        $this->error .= "<p class='success'>Le fichier est bien une image : - " . $check["mime"] . ".</p>";
		        $this->uploadOk = 1;
		    } else {
		        $this->error .= "<p class='error'>Le fichier n' est pas une image !.</p>";
		        $this->uploadOk = 0;
		    }
			*/
			// Check if file already exists
			/*
			if (file_exists($this->target_file)) {
				$this->error .= "<p class='error'>Désolé, Le fichier existe déja.</p>";
				$this->uploadOk = 0;
			}
			*/
			// Check file size
			if ($_FILES[$nameFile]["size"] > 500000) {
				$this->error .= "<p class='error'>Attention l' image est trop lourd !.</p>";
				$this->uploadOk = 0;
			}
			
			// Allow certain file formats
			if($this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg"
			&& $this->imageFileType != "gif" ) {
				$this->error .= "<p class='error'>Seule les fichiers JPG, JPEG, PNG & GIF sont autorisées.</p>";
				$this->uploadOk = 0;
			}
			// Check if $this->uploadOk is set to 0 by an error
			if ($this->uploadOk == 0) {
				$this->error .= "<p class='error'>Echec de l'upload.</p>";
			// if everything is ok, try to upload file
			} else {
				$this->name = basename( $_FILES[$nameFile]["name"]);
				$info = new \SplFileInfo($this->name);
				if($info->getExtension() =='jpg' || $info->getExtension() =='png' || $info->getExtension() =='jgep' || $info->getExtension() =='gif'){
					if (move_uploaded_file($_FILES[$nameFile]["tmp_name"], "$this->target_file/$this->name")) {
					$this->error .= "<p class='success'>le fichier ". basename( $_FILES[$nameFile]["name"]). " est bien uploadés.</p>";
						//var_dump($_FILES[$nameFile]["name"]);
					} else {
						$this->error .= "<p class='error'>Désoler cela na pas fonctionné.</p>";
					}
				}

			}
			return ($this->uploadOk ===1)?$this->name : $this->error;
		}
		
	}
    
}