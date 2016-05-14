<?php
	//Permet l'affichage d'un article entier
	//Rajouter un lien vers la page du mec?
	function  affiche_article($article) {
		echo '<div>'.htmlentities($article["title"]).'écrit par '.htmlentities($article["user"]).'le '.htmlentities($article["date"]).'</div>';
		echo '<div>'.htmlentities($article["content"]).'</div>';
		echo '<div>'.htmlentities($article["category"]).'</div>';
	}
	
	//Permet l'affichage partiel d'un article dans la page d'accueil
	function affichage_partiel($article) {
		echo "<div>".htmlentities($article["title"])." par ".htmlentities($article["user"]);
		echo "<img src= ";
		switch($article["category"]) {
			case "blabla":
				echo("\"chemin vers l'image\" alt=\"\"");
				break;
		}
	}
	function afficherListeArticle ($données, $attr) {
		$liste = chercher($données, $attr);
		if (!isset($liste) || is_null($liste) || empty($liste)) {
			echo("Aucun résultat trouvé");
		} else {
			for($i=0;$i<sizeof($liste);$i++){
				echo '<form action="index.php" method="get">'.
				htmlentities($liste[$i]["title"])." ".htmlentities($liste[$i]["user"]).'
				<input type="hidden" name="article" value="'.htmlentities($liste[$i]["title"]).'">
				<input type="submit" value="Lire l\'article">
				</form>';
			}
		}
	}
?>
