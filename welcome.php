<?php
	include_once("affichage.php");
	include_once("recherche.php");
?>
<DOCTYPE! html>
<head>
	<title> Accueil </title>
	<meta charset="UTF-8">
<head>

<body>
	<div>
		<?php
		
		//On implente ici la variable pour déterminer le nombre d'articles affichés ici
		if (isset($_POST["nbArticles"])) {
			$nbArticles = $_POST["nbArticles"] + 6;
		} else {
			$nbArticles = 6;
		}
		
		$server="pams.script.univ-paris-diderot.fr";
		$user="phiear22";
		$base="phiear22";
		$connexion=mysql_connect($server,$user,'r1M)qu0K');
		$value = chercherS(null, null, $connexion);
		
		$value = array_reverse($value, true);
		$compteur = 0;
		foreach($value as $v){
			$compteur++;
			affichage_partiel($v);
			?>
			<!-- lien vers les articles affichés -->
			<form action="index.php" method="get">
				<input type="hidden" name="article" value=<?php echo($v); ?>>
				<input type="submit" value="aller à l'article">
			</form>
			<?php
			if($compteur == $nbArticles) {
				break;
			}
		}
		?>
	</div>
	
	<div>
		<!-- Lien pour afficher plus d'articles, toujours dans l'ordre "plus récent"-->
		<form action="welcome.php" method="get">
			<input type="hidden" value=<?php $nbArticles ?>>
			<input type="submit" value="Voir plus">
		</form>
	</div>
</body>
</html>