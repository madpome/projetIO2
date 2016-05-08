<?php
	
	//Ajouter un article et renvoie le message correspondant au résultat de la fonction
	function ajouterArticle ($title, $content, $category) {
		$req = "INSERT INTO article user, title, content, date, category VALUES $_SESSION[\"user\"], \"$title\", \"$content\", NOW(), $category";
		$con = mysql_connect($serv, $user);
		if (!chercher($titre, "Titre", $con) {
			return "Ce titre existe déjà.";
		} else {
			$result = mysql_query($con, $req);
			if (!$result) {
				return "Impossible d'accéder à votre requête.";
			} else {
				return "Article posté!";
			}
		}
	}
	function machin(){
?>
	<div>
		<?php
		$_POST["title"] = htmlspecialchars($_POST["title"]);
		$_POST["content"] = htmlspecialchars($_POST["content"]);
		$result = ajouterArticle($_POST["title"], $_POST["content"], $_POST["category"]);
		echo($result);
		
		if ($result == "Ce titre existe déjà.") {
		?>
		
		<form method="post" action="ajouterArticleForm">
			<label> Retourner vers l'écriture d'article </label>
			<div class="infos">
				<!-- Les infos à retourner vers le formulaire d'ajout d'article - éviter la réécriture si possible. -->
				<input type="hidden" name="title" value=<?php echo("$_POST[\"title\"]");?>>
				<input type="hidden" name="content" value=<?php echo("$_POST[\"content\"]");?>>
				<input type="hidden"  name="category" value=<?php echo("$_POST[\"category\"]");?>>
			</div>
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
			echo("<input type=\"hidden\" name=\"article\" value=$value>");
			?>
			
			<input type="submit" value="Voir l'article">
		</form>
		
		<?php
		}
		?>
	</div>
<?php 
}
?>
