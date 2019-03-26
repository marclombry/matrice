<?php

// return name of application
if(! function_exists('nameApp')){
	function nameApp(){
		return isset($_SERVER['REQUEST_URI'])? $_SERVER['REQUEST_URI']: '/';
	}

}


// renvoie une mise en forme html d'un array //
if(! function_exists('tableHtmlForMail')){
	function tableHtmlForMail($array=null){
		//si un tableau est passé en parametre
		if(is_array($array)){
			// création des entêtes
			$html = '<table style="width: 100%;border-collapse: collapse;">';
			$html .= '<thead>';
			$html.='<tr style="border-bottom: 1px solid grey;">';
				foreach(current($array) as $key=>$entete){
					$html.='<th style="text-align: left;padding: 8px;line-height: 1.42857143;vertical-align: bottom;border-bottom: 2px solid #ddd;">'.$entete.'</th>';
				}
			$html.='</tr>';
			$html.='</thead>';
			//création du contenu
			$html.='<tbody>';
				foreach($array as $key){
					$html.='<tr style="border-bottom: 1px solid grey;">';
					foreach($key as $cle=>$entete){
						
						$html.='<td style="text-align: left;padding: 8px;line-height: 1.42857143;vertical-align: bottom;border-bottom: 2px solid #ddd;">'.$entete.'</td>';
					}
					$html.='</tr>';
				}
				
			$html .= '</tbody></table>';
			
		return $html;
		}
	
	}
	
}

// renvoi les headers pour envoyé en mail
if(!function_exists('headerMail')){
	// créeation de l'envoie de mail ,le message(contenu du $msg),le titre (pour le subject et nom ),la liste (to) (string) ,la liste en copie (cc) (string)
	function headerMail($msg,$title=null,$listTo=null,$listCc=null){
		if(!empty($msg)){
			$msg .= "<p>Ci-joint, le $title au ".date('d-m-Y_H-i-s').".</p>
		<p><i>Ceci est un e-mail automatique généré le ".date('d/m/Y à H:i').".</i></p></body></html>";
		@ob_start();

		$fileContent = @ob_get_contents();
		@ob_end_clean();
		
		//juste mail//
		
		$cfgMail=array
		(
			'debug'=>false,
			'subject'=>$title,
			'message'=>$msg,
			'attachment'=>array('activate'=>false,'list'=>array
			(
				array('file'=>null,'name'=>null)
			)),
			'to'=>array($listTo),
			'cc'=>array($listCc)
		);
		//Envoi de l'e-mail
		sendEmail($cfgMail);
		exit;
		}
		
	}
	
}


if(!function_exists('headerMailExcel')){
	function headerMailExcel($classeur,$name,$msg=null,$to=null,$cc=null){
		if (isset($_GET['onlyDL']) && $_GET['onlyDL'] = 1){
			$fileName = "$name".date('d-m-Y_H-i-s').".xlsx";
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$fileName.'"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');
			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0
			$objWriter = PHPExcel_IOFactory::createWriter($classeur, 'Excel2007');
			$objWriter->save('php://output');
		}else{
			@ob_start();
			$objWriter = PHPExcel_IOFactory::createWriter($classeur, 'Excel2007');
			$objWriter->save('php://output');
			$fileContent = @ob_get_contents();
			@ob_end_clean();
			$cfgMail=array
			(
				'debug'=>false,
				'subject'=>$name,
				'message'=>$msg,
				'attachment'=>array('activate'=>true,'list'=>array
					(
						array('file'=>$fileContent,'name'=>$name.date('d-m-Y_H-i-s').'.xlsx')
					)),
					'to'=>array($to),
					'cc'=>array($cc)
			);
					//Envoi de l'e-mail
			sendEmail($cfgMail);
			exit;
		}
	}
	
}



// generer un graphic
//Génération d'un graphique
if(!function_exists('graphic')){
	function graphic($array=null,$limit=false,$class=null,$type){
		//Initialisation du résultat
		
		$result=null;
		$labels = [];
		$donnees =[];
		if(!empty($array))
		{
			//execute la requete
			
			//az($array);
			foreach($array as $key => $requetes){
				foreach($requetes as $k =>$v){
					//ici switch case
					//récupération des clé et des valeur
					if($k !='Total HT'){
						$labels[]= $v;
					}else{
					  $donnees[] = $v;
					}
				
				}
			}
		
			//contient les labels
			$labels =json_encode($labels);
			// contient les donné (chiffre)
			$donnees =json_encode($donnees);

			$type = json_encode($type);
			
			?>
			<script>
				//trouve le canvas par ca classe
				var ctx = document.getElementsByClassName("<?= $class ?>");
			
				var chart = new Chart(ctx, {
				    // The type of chart we want to create
				    type: <?= $type ?>,

				    // The data for our dataset
				    data: {
				        labels:  <?= $labels ?>,
				        datasets: [{
				            label: "Statistique",
				            backgroundColor: ['rgb(255, 99, 132)','blue','green','yellow'],
				            borderColor: 'rgb(255, 99, 132)',
				            data: <?= $donnees ?>
				        }]
				    },

				    // Configuration options go here
				    options: {}
				});
				</script>
				<?php
		}
		
	}
}


	