<?php
	function welcome(){
		if($_SESSION["connect"]){
			echo "BONJOUR".$_SESSION["fistname"]." ".$_SESSION["lastname"]." votre mail est :".$_SESSION["mail"];
			echo "Votre liste d'article : ";
			echo "<div>";
			$server="pams.script.univ-paris-diderot.fr";
			$user="phiear22";
			$base="phiear22";
			$connexion=mysql_connect($server,$user,'r1M)qu0K');
			afficherListeArticle ($_SESSION["user"], "user", $connexion);
			echo "</div>";
		}else{
			echo "BONJOUR INCONNU";
		}
	}
?>
