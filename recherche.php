<?php
	//Retourne la liste des articles dont les attributs ($attrReq) correspondent aux données en paramètres
	function chercherS ($donnéesReq, $attrReq, $con) {
		$req = "SELECT * FROM Articles WHERE \"$attrReq\" = \"$donnéesReq\"";
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
	
	//renvoie vrai si les deux entrées sont des tableaux de même taille
	function check ($données, $attr) {
		$ans = is_array($données) && is_array($attr);
		$ans = $ans && count($données) == count($attr);
		return ans;
	}
	
	//Permet de taitrer les entrées $données et $attr pour la requête slq avant les passer à chercher()
	function chercher ($données, $attr, $connexion) {
		if (check($données, $attr)) {
			foreach($données as $v) {
				$donnéesReq = $donnéesReq.$v.",";
			}
			foreach($attr as $c => $v) {
				$attrReq = $attrReq.$v.","
			}
			return chercherS(trim($donnéesReq,","), trim($attrReq,","), $connexion);
		} else {
			return chercherS($données, $attr, $connexion);
		}
	}
	
	//Permet l'affichage de la liste des articles donnée par la fonction de recherche
	//En argument, les données pour la recherche
	function afficherListeArticle ($données, $attr, $connexion) {
		$liste = chercher($données, $attr, $connexion);
		if (is_null($liste) {
			echo("Aucun résultat trouvé");
		} else {
			foreach($liste as $v) {
				//ligne à finir pour renvoyer sur les articles affichés
				echo("<form action=\"\" method=\"post\"> <label id=\"\" class=\"\"> $liste[\"$title\"] $liste[\"$user\"] </label> <input type=\"submit\" value=$v>");
			}
		}
	}
?>
