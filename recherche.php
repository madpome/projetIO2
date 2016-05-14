<?php
	//Renvoie la liste des articles correspondants au(x) critère(s) contenu(s) dans $attrReq
	function chercher($donneesReq, $attrReq, $con) {
		//Si les données sont dans un tableau on traite les entrées pour obtenir la requête adaptée
		if(is_array($donneesReq)) {
			$req = traiter($donneesReq, $attrReq);
		} else {
			$req = 'SELECT * FROM article WHERE '.mysql_real_escape_string($donneesReq).'="'.mysql_real_escape_string($attrReq).'"';
		}
		$result = mysql_query($con, $req);
		$ret;
		$idx = 0;
		while ($result != false) {
			$ret[$idx] = mysql_fetch_assoc($result);
			$idx++;
		}
		mysql_close();
		return $ret;
	}
	
	//Permet de taitrer les entrées $données et $attr pour la requête slq
	//Renvoie le string de la requête slq
	function traiter ($donneesReq, $attrReq) {
		foreach($donneesReq as $v) {
			$donnees = $données.$v.",";
		}
		foreach($attrReq as $v) {
			$attr = $attr.$v.",";
		}
		$donnees = trim($donnéesReq,",");
		$attr = trim($attrReq,",");
		return "SELECT * FROM article WHERE ".mysql_real_escape_string($donnees).'="'.mysql_real_escape_string($attr).'"';
	}
	
	//Renvoie la liste des catégories dans la base de données
	function listeCategory ($connexion) {
		$req = "SELECT * FROM category";
		while ($result != false) {
			$ret[$idx] = mysql_fetch_assoc($result);
			$idx++;
		}
		mysql_close();
		return $ret;
	}
?>
