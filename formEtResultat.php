<DOCTYPE! html>
<head>
	<meta charset="UTF-8">
	<title> Résultat de la recherche </title>
</head>
<body>
	<div>
		<form action="resultat.php" method="post">
			<label> Auteur : </label><input type="text" name="auteur">
			<label> Date : </label><input type="text" name="date"> 
			<label> Titre : </label><input type="text" name="title">
			<input type="submit" value="Lancer la recherche">
		</form>
	</div>
	<div>
		<?php
		include_once("recherche.php");
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
		
		afficherListeArticle($données, $attr, $connexion);
		?>
	</div>
</body>
</html>
