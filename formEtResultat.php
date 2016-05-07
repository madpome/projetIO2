<?php
	include_once("recherche.php");
?>

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
			<label> Rechercher dans (catégorie?) </label><select name="category">
					<option value="cinema"> Cinéma </option>
					<option value="litterature"> Littérature </option>
					<option value="autre">	Autre </option>
					<option value="noValue" selected> Toutes </option>
					<!-- Insérer ici de nouvelles catégories-->
				</select>
			<input type="submit" value="Lancer la recherche">
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
		if ($_POST["category"] != "noValue") {
			$données[3] = $_POST["category"];
			$attr[3] = "category";
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
