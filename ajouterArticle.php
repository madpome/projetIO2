<?php
	function ajouterArticle ($title, $content) {
		$req = "INSERT INTO article user, title, content, date VALUES \"$_SESSION["user"]\", \"$title\", \"$content\", NOW()";
		$con = mysql_connect($serv, $user);
		if (!cherche($titre, "Titre", $con) {
			return "Ce titre existe déjà";
		} else {
			$result = mysql_query($con, $req);
			if (!$result) {
				return "Impossible d'accéder à votre requête.";
			} else {
				return "Article posté!";
			}
		}
	}
?>
