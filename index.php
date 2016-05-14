<?php
	session_start();
	include_once("connexion.php");
	include_once("inscription.php");
	include_once("sauvegarde.php");
	include_once("page.php");
	include_once("profil.php");
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
