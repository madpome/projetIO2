<?php
	session_start();
	include_once("connexion.php");
	include_once("inscription.php");
	include_once("sauvegarde.php");
	include_once("page.php");
	isconnected();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mon site d'IO2</title>
</head>
<body>
<header>
<?php
	//menu();
?>
</header>
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
				$valide=connexion($_POST["login"],$_POST["pwd"]);
				if($valide){
					getatt();
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
				affiche_article($_SESSION["article"]);
				break;
			default:
				welcome();
				break;		
		}
	}else{
		welcome();
	}
?>
</body>
<footer>
<?php //footer() ?>
</footer>
</html>
