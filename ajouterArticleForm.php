<DOCTYPE! hmtl>
<head>
	<title> Ajouter Un Article </title>
	<meta charset="UTF-8">
</head>
<body>
	<div>
		<form method="post" action="ajouterArticle.php">
			<?php
				if(isset($_POST["title"]{
					$value = $_POST["title"];
				} else {
					$value = "Votre titre";
				}
				echo("<label> Titre : <label> <input type=\"text\" name=\"title\" size=\"50\" value=$value maxlength=\"200\" required>");

				if(isset($_POST["content"])){
					$value = $_POST["content"];
				} else {
					$value = "Votre article";
				}
				echo("<textarea name=\"content\" rows=\"50\" cols=\"50\" value=$value maxlength=\"20000\" required> Ecrivez votre article ici </textarea>");
			?>
			<input type="submit" value="Envoyer">
		</form>
	</div>
</body>
</html>