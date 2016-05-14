<?php
	//Ajouter un article et renvoie le message correspondant au résultat de la fonction
	function ajouterArticledb ($title, $content, $category) {
		$server="localhost";
		$user="phiear22";
		$req = 'INSERT INTO articles (user,user_id, title, content, date, category) VALUES '.@mysql_real_escape_string($_SESSION["user"]).','.@mysql_real_escape_string($_SESSION["user_id"]).','.@mysql_real_escape_string($title).','.@mysql_real_escape_string($content).', NOW(),'.@mysql_real_escape_string($category);
		$con = mysql_connect($serv, $user);
		if (!chercher($titre, "title")){
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
	function ajoutArticle(){
?>
	<div>
		<?php
		$result = ajouterArticledb($_POST["title"], $_POST["content"], $_POST["category"]);
		
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
<?php
//Créer un formulaire pour l'ajout d'un article
	function formajoutarticle(){
		$server="localhost";
		$user="phiear22";
		$base="phiear22";
		$connexion=@mysql_connect($server,$user,'r1M)qu0K');
		$category = listeCategory();
		if($_SESSION["connect"]){
?>
		<div id="formarticle">
			<form method="post" action="index.php?page=ajoutArticle">
				<?php
				if(isset($_POST["title"])){
					$value=$_POST["title"];
				} else {
					$value="Votre titre (200 caractères max)";
				}
				?>
				<label> Titre : <label> <input type="text" name="title" size=50 value="<?php echo htmlentities($value); ?>" maxlength=200 required>

				<?php
				if(isset($_POST["content"])){
					$value = $_POST["content"];
				} else {
					$value = "Votre article (20.000 caractères max)";
				}
				?>
				<textarea name="content" rows="50" cols="100" maxlength="20000" required> <?php echo htmlentities($value); ?> </textarea>
				
				<select name="category">
					<?php
					foreach ($category as $v) {
						echo("<option value=$v");
						if($_POST["category"] == "$v"){
							echo("selected");
						}
						echo ">.".htmlentities($v)."</option>";
					}
					?>
				</select>
				
				<input type="submit" value="Poster cet article">
			</form>
		</div>
		<?php
		}else{
			pasencoreinscrit();
		}
		?>
<?php
}
?>