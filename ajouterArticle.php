<?php
	include_once("recherche.php")
	function ajouterArticle ($title, $content) {
		$server="pams.script.univ-paris-diderot.fr";
		$user="phiear22";
		$base="phiear22";
		$connexion=mysql_connect($server,$user,'r1M)qu0K');
		mysql_select_db($base,$connexion);
		$req = "INSERT INTO article user, title, content, date VALUES \"$_SESSION[\"user\"]\", \"$title\", \"$content\", NOW()";
		if (!cherche($title, "title", $connexion) {
			return "Ce titre existe déjà";
		} else {
			$result = mysql_query($req,$connexion);
			if (!$result) {
				return "Impossible d'accéder à votre requête.";
			} else {
				return "Article posté!";
			}
		}
	}
?>
