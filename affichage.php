<?php
	//Permet l'affichage d'un article entier
	function  affiche_article($article) {
		echo("<div><label> $article[\"title\"] </label> <label> par $article[\"user\"] </label> <label> écrit le $article[\"date\"]</div>");
		echo("<div> $article[\"content\"] </div>");
	}
	
	//Permet l'affichage partiel d'un article dans la page d'accueil
	function affichage_partiel($article) {
		echo("<div><label> $article[\"title\"] </label> <label> par $article[\"user\"] </label>");
		echo("<img src= ");
		switch($article[$categorie]) {
			case :
				echo("\"/*chemin vers l'image*/\" alt=\"\"");
				break;
		}
	}
?>
