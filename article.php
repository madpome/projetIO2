<?php
	//Ajouter un article. Renvoie TRUE si l'article a été posté, FALSE sinon.
	function ajouterArticledb ($title, $content, $category) {
		$server="pams.script.univ-paris-diderot.fr";
		$user="phiear22";
		$base="phiear22";
		$con=@mysql_connect($server,$user,'r1M)qu0K');
		mysql_select_db($base,$con);
		$reqtime='SELECT NOW()';
		$restime=mysql_query($reqtime,$con);
		$time=mysql_fetch_array($restime);
		$reqcat='SELECT category_id FROM category WHERE name="'.$category.'"';
		$result=mysql_query($reqcat,$con) or die(mysql_error());
		$ligne=mysql_fetch_assoc($result);
		$req='INSERT INTO article (user,user_id,title,content,date,category_id) VALUES ("'.@mysql_real_escape_string($_SESSION["user"]).'","'.@mysql_real_escape_string($_SESSION["user_id"]).'","'.@mysql_real_escape_string($title).'","'.@mysql_real_escape_string($content).'","'.$time[0].'","'.@mysql_real_escape_string($ligne["category_id"]).'")';
		$bool=chercher($title,"title");
		if (!empty($bool)){
			return FALSE;
		}else{
			$result=mysql_query($req,$con);
			if($result!=1){
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}
	
	//Si l'article est inséré alors on propose de le lire, sinon on peut retourner au formulaire d'écriture
	function ajoutArticle(){
?>
		<div id="center">
<?php
		$result = ajouterArticledb($_POST["title"], $_POST["content"], $_POST["category"]);
		if (!$result){
?>
			L'article n'a pas pu être publié, veuillez verifier que le titre n'est pas déjà utilisé.
			<form method="post" action="index.php?page=ecrire">
				<!-- Les infos à retourner vers le formulaire d'ajout d'article - éviter la réécriture si possible. -->
				<input type="hidden" name="title" value="<?php echo htmlentities($_POST["title"]); ?>">
				<input type="hidden" name="content" value="<?php echo htmlentities($_POST["content"]);?>">
				<input type="hidden" name="category" value="<?php echo htmlentities($_POST["category"]);?>">
				<input type="submit" value="Retourner vers l'écriture d'article">
			</form>
			<a href="index.php"> Retourner à l'accueil </a>	
<?php
		}else{
			echo "L'article a bien été inséré";
?>
			<form action="index.php" method="GET">
<?php
				$value=chercher($_POST["title"],"title");
				echo '<input type="hidden" name="page" value="article">';
				echo '<input type="hidden" name="article" value="'.htmlentities($value[0]["title"]).'">';
?>
				<input type="submit" value="Voir l'article">
			</form>
		
<?php
		}
?>
	</div>
<?php 
	}

	//Créer un formulaire pour l'ajout d'un article
	function formajoutarticle(){
		$server="pams.script.univ-paris-diderot.fr";
		$user="phiear22";
		$base="phiear22";
		$connexion=@mysql_connect($server,$user,'r1M)qu0K');
		mysql_select_db($base,$connexion);
		$category=listeCategory();
		if($_SESSION["connect"]){
?>
			<div id="center">
				<form method="post" action="index.php?page=ajoutArticle">
<?php
					if(isset($_POST["title"])){
						$value=$_POST["title"];
					} else {
						$value="Votre titre (200 caractères max)";
					}
?>
					Titre : <input type="text" name="title" size=50 value="<?php echo htmlentities($value); ?>" maxlength=200 required>	
					Catégorie : <select name="category">
<?php
						foreach ($category as $v) {
							echo("<option value=$v");
							if(!empty($_POST["category"]) && $_POST["category"]==$v){
								echo("selected");
							}
							echo ">".htmlentities($v)."</option>";
						}
?>
					</select>
<?php
					if(isset($_POST["content"])){
						$value=$_POST["content"];
					} else {
						$value="Votre article (20.000 caractères max)";
					}
?>
					<textarea name="content" rows="50" cols="90" maxlength="20000" required><?php echo htmlentities($value); ?></textarea>
					<input type="submit" value="Poster cet article">
				</form>
			</div>
<?php
		}else{
			pasencoreinscrit();
		}
	}
=?>