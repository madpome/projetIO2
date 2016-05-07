<?php
	//Permet l'affichage d'un article entier
	//Rajouter un lien vers la page du mec?
	function  affiche_article($article) {
		echo("<div><label> $article[\"title\"] </label> <label> écrit par $article[\"user\"] </label> <label> le $article[\"date\"]</div>
		<div> $article[\"content\"] </div>
		<div> $article[\"category\"] </div>");
	}
	
	//Permet l'affichage partiel d'un article dans la page d'accueil
	function affichage_partiel($article) {
		echo("<div><label> $article[\"title\"] </label> <label> par $article[\"user\"] </label>");
		echo("<img src= ");
		switch($article["category"]) {
			case :
				echo("\"chemin vers l'image\" alt=\"\"");
				break;
		}
	}
?>
