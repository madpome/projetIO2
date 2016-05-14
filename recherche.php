<?php
	//Renvoie la liste des articles correspondants au(x) critère(s) contenu(s) dans $attrReq
	function chercher($donneesReq, $attrReq) {
		//Si les données sont dans un tableau on traite les entrées pour obtenir la requête adaptée
		$server="localhost";
		$user="phiear22";
		$base="phiear22";
		$con=@mysql_connect($server,$user,'r1M)qu0K');
		mysql_select_db($base,$con);
		if(is_array($donneesReq)) {
			$req = traiter($donneesReq, $attrReq);
		} else {
			$req = 'SELECT title,user FROM article WHERE '.@mysql_real_escape_string($attrReq).'="'.@mysql_real_escape_string($donneesReq).'"';
		}
		$result=mysql_query($req,$con);
		$ret=array();
		$idx=0;
		while ($ligne=mysql_fetch_assoc($result)) {
			if(is_array($donneesReq)){
				for($i=0;$i<count($attrReq);$i++){
					$ret[$idx][$attrReq[$i]]=$ligne[$attrReq[$i]];
				}
			}else{
				$ret[$idx]["user"]=$ligne["user"];
				$ret[$idx]["title"]=$ligne["title"];
			}
			$idx++;
		}
		mysql_close();
		return $ret;
	}
	//Permet de taitrer les entrées $données et $attr pour la requête slq
	//Renvoie le string de la requête slq
	function traiter ($donneesReq, $attrReq) {
		$reponse='SELECT * FROM article WHERE ';
		for($i=0;$i<count($donneesReq);$i++){
			if($i==(count($donneesReq)-1)){
				$reponse.=@mysql_real_escape_string($attrReq[$i]).'="'.@mysql_real_escape_string($donneesReq[$i]).'"';
			}else{
				$reponse.=@mysql_real_escape_string($attrReq[$i]).'="'.@mysql_real_escape_string($donneesReq[$i]).'" AND';
			}
		}
		return $reponse;
	}
	
	//Permet l'affichage de la liste des articles donnée par la fonction de recherche
	//En argument, les données pour la recherche
	
	
	//Renvoie la liste des catégories dans la base de données
	function listeCategory ($connexion) {
		$req = "SELECT * FROM category";
		while ($result != false) {
			$ret[$idx] = mysql_fetch_assoc($result);
			$idx++;
		}
		return $ret;
	}
?>
