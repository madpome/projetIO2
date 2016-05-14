<?php
	//Permet l'affichage d'un article entier
	//Rajouter un lien vers la page du mec?
	function  affiche_article($article) {
		echo  '<div>'.$article["title"].'écrit par '.$article["user"].'le '.$article["date"].'</div>';
		echo '<div>'.$article["content"].'</div>';
		echo '<div>'.$article["category"].'</div>';
	}
	
	//Permet l'affichage partiel d'un article dans la page d'accueil
	function affichage_partiel($article) {
		echo  "<div>$article[\"title\"] par $article[\"user\"]");
		echo("<img src= ");
		switch($article["category"]) {
			case :
				echo("\"chemin vers l'image\" alt=\"\"");
				break;
		}
	}
?>
