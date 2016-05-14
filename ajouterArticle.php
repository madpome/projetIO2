<?php
	
	//Ajouter un article et renvoie le message correspondant au résultat de la fonction
	function ajouterArticle ($title, $content, $category) {
		$server="localhost";
		$user="phiear22";
		$req = 'INSERT INTO articles (user,user_id, title, content, date, category) VALUES '.mysql_real_escape_string($_SESSION["user"]).','.mysql_real_escape_string($_SESSION["user_id"]).','.mysql_real_escape_string($title).','.mysql_real_escape_string($content).', NOW(),'.mysql_real_escape_string($category);
		$con = mysql_connect($serv, $user);
		if (!chercher($titre, "Titre")){
			return FALSE;
		} else {
			$result = mysql_query($con, $req);
			if (!$result) {
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}
	function (){
?>
	<div>
		<?php
		//Inutile, le on escape uneiquement lors de l'affichage
		//$_POST["title"] = htmlspecialchars($_POST["title"]);
		//$_POST["content"] = htmlspecialchars($_POST["content"]);
		$result = ajouterArticle($_POST["title"], $_POST["content"], $_POST["category"]);
		
		if (!$result){
		?>
		
		L'article n'a pas pu être publié, veuillez verifier que le titre n'est pas déjà utilisé.
		<form method="post" action="ajouterArticleForm">
			<!-- Les infos à retourner vers le formulaire d'ajout d'article - éviter la réécriture si possible. -->
			<input type="hidden" name="title" value="<?php echo htmlentities($_POST["title"]); ?>">
			<input type="hidden" name="content" value="<?php echo htmlentities($_POST["content"]);?>">
			<input type="hidden"  name="category" value="<?php echo htmlentities($_POST["category"]);?>">
			<input type="submit" value="Retourner vers l'écriture d'article">
		</form>
		<a href="index.php"> Retourner à l'accueil </a>	
		<?php
		} else {
		?>
		
		<form action="index.php?page=article" method="GET">
		
			<?php
			$server="pams.script.univ-paris-diderot.fr";
			$user="phiear22";
			$base="phiear22";
			$connexion=mysql_connect($server,$user,'r1M)qu0K');
			$value = chercher($_POST["title"], "title", $connexion);
			echo '<input type="hidden" name="article" value='.htmlentities($value).">";
			mysql_close();
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
