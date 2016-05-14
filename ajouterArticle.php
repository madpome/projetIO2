<?php
	
	//Ajouter un article et renvoie le message correspondant au résultat de la fonction
	function ajouterArticle ($title, $content, $category) {
		$req = 'INSERT INTO article user, title, content, date, category VALUES'.$_SESSION["user"].','.$title.','.$content.', NOW(),'.$category;
		$con = mysql_connect($serv, $user);
		if (!chercher($titre, "Titre", $con) {
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
		L'article n'a pas pu être publier, veuillez verifier que le titre n'est pas déjà utilisé.
		<form method="post" action="ajouterArticleForm">
			<!-- Les infos à retourner vers le formulaire d'ajout d'article - éviter la réécriture si possible. -->
			<input type="hidden" name="title" value= <?php echo $_POST["title"]; ?>>
			<input type="hidden" name="content" value=<?php echo $_POST["content"];?>>
			<input type="hidden"  name="category" value=<?php echo $_POST[\"category"];?>>
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
			$value = chercherS($_POST["title"], "title", $connexion);
			echo '<input type="hidden" name="article" value='.$value.">";
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
