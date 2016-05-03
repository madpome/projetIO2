<?php
	include_once("recherche.php");
	//fonction qu'il faudra déplacer
	function getAuthor(){//renvoie les auteurs sous la forme d'un tableau
		$server="pams.script.univ-paris-diderot.fr";
		$user="phiear22";
		$base="phiear22";
		$connexion=mysql_connect($server,$user,'r1M)qu0K');
		mysql_select_db($base,$connexion);
		$req='SELECT DISTINCT user FROM article ORDER BY name';
		$resultat=mysql_query($req,$connexion);
		$retour;
		$i=0;
		while(mysql_fetch_assoc($resultat)){
			$retour[$i]=$resultat['user'];
			$i++;
		}
		return $retour;
	}
?>
<div>
	<form action="resultat.php" method="post">
		<label> Auteur : </label>
		<select name="auteur">
		<?php
			$table=getAuthor();
			for(int $i=0;$i<sizeof($table),$i++){
				echo "<option>".$table[$i]."</option>";
			}
			
		</select>
		//<label> Date : </label><input type="text" name="date"> osef de la date 
		<label> Titre : </label><input type="text" name="title"> 
	</form>
</div>
<div>
<?php
	$données;
	$attr;
	
	if (isset($_POST["auteur"])) {
		$données[0] = htmlspecialchars($_POST["auteur"]);
		$attr[0] = "user";	
	}
	if (isset($_POST["date"])) {
		$données[1] = htmlspecialchars($_POST["date"]);
		$attr[1] = "date";
	}
	if (isset($_POST["title"])) {
		$données[2] = htmlspecialchars($_POST["title"]);
		$attr[2] = "title";
	}
	
	$server="pams.script.univ-paris-diderot.fr";
	$user="phiear22";
	$base="phiear22";
	$connexion=mysql_connect($server,$user,'r1M)qu0K');
	
	afficherListeArticle($données, $attr, $connexion);		?>
</div>
