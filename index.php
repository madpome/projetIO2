<?php
	session_start();
	include_once("connexion.php");
	include_once("inscription.php");
	include_once("sauvegarde.php");
	include_once("page.php");
	include_once("profil.php");
	include_once("ajouterArticleForm.php");
	include_once("commandeseffets.php");
	include_once("commande.php");
	include_once("formEtResultat.php");
	include_once("recherche.php");
	include_once("affichage.php");
	include_once("ajouterArticle.php");
	include_once("verification.php");
	include_once("welcome.php");
	isconnected();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mon site d'IO2</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header id="thetop">
<?php
if($_SESSION["connect"]){
	formuncon();
}else{
	formcon();
}
accueil();
	menuhori();
?>
</header>
<div id="grosdiv">
	<?php menuvert(); ?>
<div id="blabla">
<?php	
	if(isset($_GET["page"])){
		switch($_GET["page"]){
			case "inscription":
				if(isconnected()){
					inscrit();
				}else{		
					non_inscrit();
				}
				break;
			case "connexion":
				if(connexion($_POST["login"],$_POST["pwd"])){
					header('Location: index.php');
				}else{
					nonvalide();
				}
				break;
			case "deconnexion":
				deconnexion();
				break;
			case "save":
				sauvegarde();
				break;			
			case "article":
				affiche_article($_GET["article"]);
				break;
			case "update":
				update();
				break;
			case "profil":
				profil();
				break;
			case "ecrire":
				formajoutarticle();
				break;
			case "supprmembre":
				choixsuppruser();
				break;
			case "supprarticle":
				choixsupprarticle();
				break;
			case "choixsupprcategory":
				choixsupprcate();
				break;
			case "formajoutcategory":
				formajoutcategory();
				break;
			case "suppression":
				suppression();
				break;
			case "ajout":
				ajout();
				break;
			case "rechercher":		
-				formrechercherarticle();		
-				break;		
-			case "resultat":		
-				resultatrecherche();		
-				break;		
-			case "category":		
-				affichagerecherchecategorie();		
-				break;
			default:
				welcome();
				break;		
		}
	}else{
		welcome();
	}
?>
</div>
<div id="remonte">
	<a href=#thetop><img id="tothetop" src="arrowup.png" alt="REMONTER"></a>
</div>
<footer>
<?php footer(); ?>
</footer>
</div>
</body>
</html>
