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
			case :
				echo("\"chemin vers l'image\" alt=\"\"");
				break;
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
				echo '<form action="index.php" method="get">'.
					htmlentities($liste["$title"])." ".htmlentities($liste["$user"]).'
					<input type="hidden" name="article" value='.$v.'>
					<input type="submit" value="Lire l\'article">
				</form>';
			}
		}
	}
?>
