<?php
$dbInformations = getDbInformations("CEGID");
$cnxCEGID = new MyPDO($dbInformations);
$dbInformations = getDbInformations("EGO");
$cnxEGO = new MyPDO($dbInformations);

function recupUri($url){
	// on recupére le $_SERVER['PHP_SELF']
	$uri = explode('/',$url);
	// on stock la dernière valeur du tableaux (nomFichier.php)
	$name = end($uri);
	// on retourne le nom du fichier -4 (pour le .php)
	return substr($name,-4);
}
function searchLetter($count){
	
	$alphabet=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
	'AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ',
	'BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ',
	'CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ',
	'DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ',
	'EA','EB','EC','ED','EE','EF','EG','EH','EI','EJ','EK','EL','EM','EN','EO','EP','EQ','ER','ES','ET','EU','EV','EW','EX','EY','EZ'
	);
	
	if($count<0){$count=0;}
	return $alphabet[$count];
}

if(!function_exists('fetchSql')){	
	function fetchSql($sql=null,$limit=null,$key=null){

		if(!empty($sql)){
		global $cnxCEGID;
		$sql = utf8_encode($sql);
		// si on trouve un parametre limit on modifie la requete avec un str_repleace
		if($limit){
				$sql = str_replace('select', 'select '.$limit, $sql);
				
			}
		if(!is_object($sql)){
			$q=$cnxCEGID->prepare($sql);
		}else{
			$q=$cnxCEGID->query($sql);
		}
		
		//a($q);
		$q->execute();
		$data=$q->fetchAll();

		if(!empty($key))
		{
			$rst=array();
			foreach($data as $v)
			{
				$rst[$v[$key]]=$v;
			}
		}
		else
		{
			$rst=$data;
		}
		
		return $rst;
		}
	}
}
if(!function_exists('fetchSqlQuery')){	
	function fetchSqlQuery($sql=null,$limit=null,$param=null){

		if(!empty($sql)){
		global $cnxCEGID;
		
		$sql = utf8_encode($sql);
		// si on trouve un parametre limit on modifie la requete avec un str_repleace
		if($limit){
				$sql = str_replace('select', 'select '.$limit, $sql);
				
			}
	
		$q=$cnxCEGID->prepare($sql);
	 	
		if($param){
			$q->bindParam(':param',$param);
		}
		//a($q);
		$q->execute();
		$data=$q->fetchAll();
		if(empty($data)){$data=0;}
 		
		
		return $data;
		}
	}
}

// fonction de création des fichier excel avec un nom de fichier et la requete sql à traiter
function  statsExcel($statsName,$sqls,$limits=null){
 
   		$today=date('d/m/Y');

	    // création des objets de base et initialisation des informations d'entête
	
		$cpt=4;
		$classeur = new PHPExcel;

		$classeur->getProperties()->setCreator("informatique");

		$classeur->setActiveSheetIndex(0);

		$feuille=$classeur->getActiveSheet();

		

		// MARGINS
		$pageMargins = $feuille->getPageMargins();
		// margin is set in inches (0.5cm)
		$margin = 0.2 / 2.54;

		$pageMargins->setTop($margin);
		$pageMargins->setBottom($margin*4);
		$pageMargins->setLeft($margin*2);
		$pageMargins->setRight($margin*2);

		//$feuille->freezePane('A'.$cpt);
		$feuille->getPageSetup()->setRowsToRepeatAtTop(array(1, $cpt-1));
		
			
		// on stock dans une variable la requete sql(traitement compris)		
		$requete = fetchSql($sqls,$limits);
		
		//$feuille->setCellValue('A3', "Référence");
		//création des entetes
		//Initialisation de la lettre 
		$letter=0;
		//pour chaque entete, on les affiche et on incrémente la lettre
		foreach ($requete[0] as $v => $val) {
			//Agrandir la taille des colonnes
			//$feuille->getColumnDimension(searchLetter($letter))->setWidth(50);
			$feuille->getColumnDimension(searchLetter($letter))->setAutoSize(true);
			$feuille->SetCellValue(searchLetter($letter).'3',$v);
			$letter++;
	
		}
		//Initialisation d'un autre compteur pour le contenu
		$letters=0;
		//initialisation du total 
		$total = 0;
		//pour chaque tableau je regarde pour chaque valeur et j'incremente le cpt(la ligne) , j'incrémente la lettre et 
		foreach($requete as $tab){
			foreach ($tab as $key=>$val) {
				//if(strpos($val,',')){ $feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode("#,#0");}
				if($key =='Total HT'){
					$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode("#,#0.00 €");
					$total+=$val;
				}

				//ICI FAIRE UN SWITCH POUR TRAITER LE FORMAT DES CELLULE//
				switch ($key) {
					case 'EAN':
						$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode("#,#0.00 ");
						break;
					case 'Création':
						$val=dateFormatFr($val);
						//$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
						break;
					case 'Saisie':
						$val=dateFormatFr($val);
						//$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
						break;
					case 'Expédition':
						$val=dateFormatFr($val);
						//$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
						break;
					case 'Livraison':
						$val=dateFormatFr($val);
						//$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
						break;
					case 'Code douanier':
						$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode("#,#0 ");
						break;
					default:
						# code...
						break;
				}
				$feuille->SetCellValue(searchLetter($letters).$cpt,$val);
				
				$letters++;	
			}
			$cpt++;
			//Initialisation de la derniere lettre
			$lastLetter = $letter-1;
			$letters=0;
		}


		//rajouter des bordure sur chaque cellule	
		for($i=0;$i<$cpt;$i++){
			$feuille->getStyle('A'.$i.':'.searchLetter(($letter-1)).$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$feuille->getRowDimension($i)->setRowHeight(20);$feuille->getStyle('A'.$i.':'.searchLetter(($letter-1)).$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$feuille->getStyle('A'.$i.':'.searchLetter(($letter-1)).$i)->getFont()->setSize(10);
			$feuille->getStyle('A'.$i.':'.searchLetter(($letter-1)).$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

		}
		//affichage du total
		if($total>0){
		$feuille->SetCellValue('A'.$cpt,'TOTAL');
		$feuille->getStyle(searchLetter($lastLetter).$cpt)->getNumberFormat()->setFormatCode("#,#0.00 €");
		$feuille->SetCellValue(searchLetter($lastLetter).$cpt,$total);

			//Création du style de la cellule total
		$feuille->mergeCells('A'.$i.':'.searchLetter(($lastLetter-1)).$i);
		$feuille->getStyle('A'.$i.':'.searchLetter(($lastLetter)).$i)->getFont()->setBold(true);
        $feuille->getStyle('A'.$i.':'.searchLetter(($lastLetter)).$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('C9C9C9');
        $feuille->getStyle('A'.$i.':'.searchLetter(($lastLetter)).$i)->getAlignment()->setWrapText(true); // accept \n
        $feuille->getStyle('A'.$i.':'.searchLetter(($lastLetter)).$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $feuille->getStyle('A'.$i.':'.searchLetter(($lastLetter)).$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        //
		}
		
	
		$feuille->mergeCells('A1:'.searchLetter(($letter-1)).'2');
		$feuille->setCellValue('A1', "$statsName au $today");
		$feuille->getStyle('A1:'.searchLetter(($letter-1)).'2')->getAlignment()->setWrapText(true); // accept \n
		$feuille->getStyle('A1:'.searchLetter(($letter-1)).'2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$feuille->getStyle('A1:'.searchLetter(($letter-1)).'2')->getFont()->setBold(true);
		$feuille->getStyle('A1:'.searchLetter(($letter-1)).'2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('C9C9C9');
		

		$feuille->setAutoFilter('A3:'.searchLetter(($letter-1)).'3');
		$feuille->getStyle('A3:'.searchLetter(($letter-1)).'3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$feuille->getStyle('A3:'.searchLetter(($letter-1)).'3')->getFont()->setBold(true);
		$feuille->getStyle('A3:'.searchLetter(($letter-1)).'3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('C9C9C9');
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 

		header('Content-Disposition: attachment;filename="'.$statsName.'.xlsx"'); 

		header('Cache-Control: max-age=0'); 

		$writer = PHPExcel_IOFactory::createWriter($classeur, 'Excel2007'); 

		$writer->save('php://output');
		
	
}

// fonction de création des fichier excel avec un nom de fichier et la requete sql à traiter
function  statsExcelByArray($name,$table){
 
   		$today=date('d/m/Y');

	    // création des objets de base et initialisation des informations d'entête
	
		$cpt=4;
		$classeur = new PHPExcel;

		$classeur->getProperties()->setCreator("informatique");

		$classeur->setActiveSheetIndex(0);

		$feuille=$classeur->getActiveSheet();

		

		// MARGINS
		$pageMargins = $feuille->getPageMargins();
		// margin is set in inches (0.5cm)
		$margin = 0.2 / 2.54;

		$pageMargins->setTop($margin);
		$pageMargins->setBottom($margin*4);
		$pageMargins->setLeft($margin*2);
		$pageMargins->setRight($margin*2);

		//$feuille->freezePane('A'.$cpt);
		$feuille->getPageSetup()->setRowsToRepeatAtTop(array(1, $cpt-1));

		// on stock dans une variable le tableau		
		$requete = $table;
		// on recupère la clé du tableau pour faire les entete
		$cleArrayBegin = key($requete);
	
		//$feuille->setCellValue('A3', "Référence");
		//création des entetes
		//Initialisation de la lettre 
		$letter=0;
		if(isset($requete[$cleArrayBegin])){
			//pour chaque entete, on les affiche et on incrémente la lettre
		foreach ($requete[$cleArrayBegin] as $v => $val) {
			//Agrandir la taille des colonnes
			
			//$feuille->getColumnDimension(searchLetter($letter))->setAutoSize(true);
			$feuille->getColumnDimension(searchLetter($letter))->setWidth(40);
			$feuille->SetCellValue(searchLetter($letter).'3',$v);
			$letter++;
	
		}
			//taille des colonne
		//$feuille->getColumnDimension('E')->setWidth(50);
		//Initialisation d'un autre compteur pour le contenu
		$letters=0;
		//initialisation du total 
		$total = 0;
		//pour chaque tableau je regarde pour chaque valeur et j'incremente le cpt(la ligne) , j'incrémente la lettre et 
		foreach($requete as $tab){
			foreach ($tab as $key=>$val) {
				//if(strpos($val,',')){ $feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode("#,#0");}
				if($key =='Total HT'){
					$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode("#,#0.00 €");
					$total+=$val;
				}

				//ICI FAIRE UN SWITCH POUR TRAITER LE FORMAT DES CELLULE//
				switch ($key) {
					case 'Référence':
						$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode("@");
						break;
					case 'N° magasin':
						$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode("@");
						break;
					case 'EAN':
						$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode("#,#0.00 ");
						break;
					case 'Création':
						$temp=dateFormatFr($val);
						$temp=explode('/',$temp);
						$val=PHPExcel_Shared_Date::FormattedPHPToExcel($temp[2],$temp[1],$temp[0]);
						$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode('dd/mm/yyyy');
						break;
					case 'Saisie':
						$temp=dateFormatFr($val);
						$temp=explode('/',$temp);
						$val=PHPExcel_Shared_Date::FormattedPHPToExcel($temp[2],$temp[1],$temp[0]);
						$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode('dd/mm/yyyy');
						break;
					case 'Expédition':
						$temp=dateFormatFr($val);
						$temp=explode('/',$temp);
						$val=PHPExcel_Shared_Date::FormattedPHPToExcel($temp[2],$temp[1],$temp[0]);
						$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode('dd/mm/yyyy');
						break;
					case 'Livraison':
						$temp=dateFormatFr($val);
						$temp=explode('/',$temp);
						$val=PHPExcel_Shared_Date::FormattedPHPToExcel($temp[2],$temp[1],$temp[0]);
						$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode('dd/mm/yyyy');
						break;
					case 'Code douanier':
						$feuille->getStyle(searchLetter($letters).$cpt)->getNumberFormat()->setFormatCode("#,#0 ");
						break;
					default:
						# code...
						break;
				}

				if(searchLetter($letters)=='A'){
					$feuille->setCellValueExplicit(searchLetter($letters).$cpt,$val,PHPExcel_Cell_DataType::TYPE_STRING);
				}else if(searchLetter($letters)=='B'){
					$feuille->setCellValueExplicit(searchLetter($letters).$cpt,$val,PHPExcel_Cell_DataType::TYPE_STRING);
				}else{
					$feuille->SetCellValue(searchLetter($letters).$cpt,$val);
				}
				
				$letters++;	
			}
			$cpt++;
			//Initialisation de la derniere lettre
			$lastLetter = $letter-1;
			$letters=0;
		}


		//rajouter des bordure sur chaque cellule	
		for($i=0;$i<$cpt;$i++){
			$feuille->getStyle('A'.$i.':'.searchLetter(($letter-1)).$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$feuille->getRowDimension($i)->setRowHeight(20);$feuille->getStyle('A'.$i.':'.searchLetter(($letter-1)).$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$feuille->getStyle('A'.$i.':'.searchLetter(($letter-1)).$i)->getFont()->setSize(10);
			$feuille->getStyle('A'.$i.':'.searchLetter(($letter-1)).$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

		}
		//affichage du total
		if($total>0){
		$feuille->SetCellValue('A'.$cpt,'TOTAL');
		$feuille->getStyle(searchLetter($lastLetter).$cpt)->getNumberFormat()->setFormatCode("#,#0.00 €");
		$feuille->SetCellValue(searchLetter($lastLetter).$cpt,$total);

			//Création du style de la cellule total
		$feuille->mergeCells('A'.$i.':'.searchLetter(($lastLetter-1)).$i);
		$feuille->getStyle('A'.$i.':'.searchLetter(($lastLetter)).$i)->getFont()->setBold(true);
        $feuille->getStyle('A'.$i.':'.searchLetter(($lastLetter)).$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('C9C9C9');
        $feuille->getStyle('A'.$i.':'.searchLetter(($lastLetter)).$i)->getAlignment()->setWrapText(true); // accept \n
        $feuille->getStyle('A'.$i.':'.searchLetter(($lastLetter)).$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $feuille->getStyle('A'.$i.':'.searchLetter(($lastLetter)).$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        //
		}
		
	
		$feuille->mergeCells('A1:'.searchLetter(($letter-1)).'2');
		$feuille->setCellValue('A1', "$name");
		$feuille->getStyle('A1:'.searchLetter(($letter-1)).'2')->getAlignment()->setWrapText(true); // accept \n
		$feuille->getStyle('A1:'.searchLetter(($letter-1)).'2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$feuille->getStyle('A1:'.searchLetter(($letter-1)).'2')->getFont()->setBold(true);
		$feuille->getStyle('A1:'.searchLetter(($letter-1)).'2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('C9C9C9');
		

		$feuille->setAutoFilter('A3:'.searchLetter(($letter-1)).'3');
		$feuille->getStyle('A3:'.searchLetter(($letter-1)).'3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$feuille->getStyle('A3:'.searchLetter(($letter-1)).'3')->getFont()->setBold(true);
		$feuille->getStyle('A3:'.searchLetter(($letter-1)).'3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('C9C9C9');
		
		//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 

		//header('Content-Disposition: attachment;filename="'.$name.'.xlsx"'); 

		//header('Cache-Control: max-age=0'); 

		//$writer = PHPExcel_IOFactory::createWriter($classeur, 'Excel2007'); 

		//$writer->save('php://output');
		
	}
	return $classeur;	
	
}

// fonction excel generation autre
function  statsExcelByArrayColumn($name,$table){
 
   		$today=date('d/m/Y');

	    // création des objets de base et initialisation des informations d'entête
	
		$cpt=4;
		$classeur = new PHPExcel;

		$classeur->getProperties()->setCreator("informatique");

		$classeur->setActiveSheetIndex(0);

		$feuille=$classeur->getActiveSheet();

		

		// MARGINS
		$pageMargins = $feuille->getPageMargins();
		// margin is set in inches (0.5cm)
		$margin = 0.2 / 2.54;

		$pageMargins->setTop($margin);
		$pageMargins->setBottom($margin*4);
		$pageMargins->setLeft($margin*2);
		$pageMargins->setRight($margin*2);

		//$feuille->freezePane('A'.$cpt);
		$feuille->getPageSetup()->setRowsToRepeatAtTop(array(1, $cpt-1));
		
	
		
		// on stock dans une variable le tableau		
		$requete = $table;
		// on recupère la clé du tableau pour faire les entete
		//$cleArrayBegin = key($requete);
	
		//$feuille->setCellValue('A3', "Référence");
		//création des entetes
		//Initialisation de la lettre 
		$letter=0;
		$chiffreColumn=1;
			//initialisation du total 
			$total = 0;
			//pour chaque tableau je regarde pour chaque valeur et j'incremente le cpt(la ligne) , j'incrémente la lettre et 
		foreach ($requete as $key => $value) {
	
			switch (key($value)) {
				case 'Commercial':
					$feuille->SetCellValue(searchLetter($letter).$chiffreColumn,$value['Commercial']);
					$letter++;
					break;
				case 'CA':
					$feuille->SetCellValue(searchLetter($letter).$chiffreColumn,$value['CA']);
					$letter++;
					break;
				case 'Prestations':
					$feuille->SetCellValue(searchLetter($letter).$chiffreColumn,$value['Prestations']);
					$letter++;
					break;
			
				default:
					# code...
					break;
			}
			$letter++;
		}
		$chiffreColumn++;

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 

			header('Content-Disposition: attachment;filename="'.$name.'.xlsx"'); 

			header('Cache-Control: max-age=0'); 

			$writer = PHPExcel_IOFactory::createWriter($classeur, 'Excel2007'); 

			$writer->save('php://output');
			
	
	//}	
	
}
// reformatage de date anglaise en français
if(!function_exists('dateFormatFr')){
	function dateFormatFr($date){
			$date = isset($date)? explode(' ',$date) : date('d/m/Y');
			$date = explode('-', $date[0]);
			$dateRefaite = $date[2].'/'.$date[1].'/'.$date[0];
			return $dateRefaite;
	}
}

//function de calcul
//pourcentage//
if(!function_exists('calcPromo')){
	function calcPromo($caPast,$promoPast){
		$result= $caPast/$promoPast;
		return ($result !=0)?$result:0; 
	}
}
//variation pour ca et promo , bien mettre les nouveau en premier parametre
if(!function_exists('calcVariation')){
	function calcVariation($caNew,$caPast){
		$result= ($caNew-$caPast)/$caPast;
		return (!$result)?$result:0; 
	}
}
//calcul du pourcentage sur objectif
if(!function_exists('calcObjectif')){
	function calcObjectif($caNew,$objectif){
		$result= $caNew/$objectif;
		return (!$result)?$result:0; 
	}
}

//calcul du pourcentage sur objectif
if(!function_exists('calcSolde')){
	function calcSolde($enveloppe,$facture){
		$result= $enveloppe-$facture;
		return (!$result)?$result:0; 
	}
}

// reformatage de date anglaise en français
if(!function_exists('dateFormatFr')){
	function dateFormatFr($date){
			$date = isset($date)? explode(' ',$date) : date('d/m/Y');
			$date = explode('-', $date[0]);
			$dateRefaite = $date[1].'/'.$date[2].'/'.$date[0];
			return $dateRefaite;
	}
}
?>