<DOCTYPE! hmtl>
<?php
	function ajouterArticle ($title, $content) {
		$req = "INSERT INTO article user, title, content, date VALUES $_SESSION[\"user\"], \"$title\", \"$content\", NOW()";
		$con = mysql_connect($serv, $user);
		if (!chercher($titre, "Titre", $con) {
			mysql_close()
			return "Ce titre existe déjà.";
		} else {
			$result = mysql_query($con, $req);
			if (!$result) {
				mysql_close()
				return "Impossible d'accéder à votre requête.";
			} else {
				mysql_close();
				return "Article posté!";
			}
		}
	}
?>
<head>
	<title> Vérification </title>
	<meta charset="UTF-8">
</head>
<body>
	<div>
		<?php
			include_once("recherche.php");
			$result = ajouterArticle($_POST["title"], $_POST["content"]);
			echo($result);
			if ($result == "Ce titre existe déjà.") {
		?>
				<form method="post" action="ajouterArticleForm">
					<label> Retourner vers l'écriture d'article </label>
					<?php
						echo("<input height=\"0\" width=\"0\" name=\"title\" value=$_POST[\"title\"]>");
						echo("<input height=\"0\" width=\"0\" name=\"content\" value=$_POST[\"content\"]>");
					?>
					<input type="submit" value="retour">
				</form>
		<?php
			} else if ($result == "Impossible d'accéder à votre requête.") {
		?>
				<a href="accueil.php"> Retourner à l'accueil </a>
		<?php
			} else {
		?>
			<form action="index.php" method="get">
		<?php
				$server="pams.script.univ-paris-diderot.fr";
				$user="phiear22";
				$base="phiear22";
				$connexion=mysql_connect($server,$user,'r1M)qu0K');
				$value = chercherS($_POST["title"], "title", $connexion);
				echo("<input height=\"0\" width=\"0\" name=\"page\" value=$value>");
		?>
				<input type="submit" value="Voir l'article">
			</form>
		<?php
			}
		?>
	</div>
</body>
</html>