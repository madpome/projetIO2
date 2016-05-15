<?php
	//Permet l'affichage d'un article entier
	function affiche_article($article_name) {
		$server="pams.script.univ-paris-diderot.fr";
		$user="phiear22";
		$base="phiear22";
		$connexion=@mysql_connect($server,$user,'r1M)qu0K');
		mysql_select_db($base,$connexion);
		$req='SELECT * FROM article WHERE title="'.@mysql_real_escape_string($article_name).'"';
		$result=mysql_query($req,$connexion) or die(mysql_error());
		$article=mysql_fetch_assoc($result);
		$article["content"]=htmlentities($article["content"]);
		//Permet de garder un minimum de mise en forme en gardant les retours a la ligne
		$article["content"]=str_replace("\n","<br>",$article["content"]);
		echo '<div id="center"><span id="fat">'.htmlentities($article["title"]).' </span> écrit par <span id="fat">'.htmlentities($article["user"]).' </span>le <span id="fat">'.htmlentities($article["date"]).'</span></div><br>';
		echo '<article>'.$article["content"].'</article>';
	}
	
	//affichage des jolies cases
	function caseCategory($category){
		$cat=htmlentities($category["name"]);
?>
		<div class="categorySquare"><a href="index.php?page=perCat&cat=<?php echo $cat;?>"><img src="<?php echo $cat.".png";?>" alt="<?php echo $cat;?>"></a></div>
<?php
	}
	
	//affichage des articles par categories
	function afficheArtCat(){
		if(!empty($_GET["cat"])){
			$donnees[0]=$_GET["cat"];
			$attr[0]="category";
			afficherListeArticle($donnees,$attr);
		}else{
			echo "Vous n'avez pas précisé de catégorie.";
		}
	
	}
	
	//Fonction qui affiche l'ensemble des categories disponibles
	function parCategory(){
		$server="pams.script.univ-paris-diderot.fr";
		$user="phiear22";
		$base="phiear22";
		$connexion=@mysql_connect($server,$user,'r1M)qu0K');
		mysql_select_db($base,$connexion);
		$req='SELECT * FROM category ORDER BY category_id DESC';
		$result=mysql_query($req,$connexion);
		echo '<h2>Toutes les catégories</h2>';
		echo '<div id="allCategory">';
		while($ligne=mysql_fetch_assoc($result)){
			caseCategory($ligne);
		}
		echo '</div>';
	}
	
	//Affiche la liste d'articles qui dont données est la valeur des attributs et attr ses attributs
	function afficherListeArticle ($données, $attr) {
		$liste=chercher($données, $attr);
		if (!isset($liste) || is_null($liste) || empty($liste)) {
			echo("Aucun résultat trouvé");
		} else {
			echo "<table>";
			for($i=0;$i<sizeof($liste);$i++){
?>			
				<form action="index.php" method="get">
					<tr>
						<td><?php echo htmlentities($liste[$i]["title"]);?></td>
						<td><?php echo htmlentities($liste[$i]["user"]);?></td>
						<td>
							<input type="hidden" name="page" value="article">
							<input type="hidden" name="article" value="<?php echo htmlentities($liste[$i]["title"]);?>">
						</td>
						<td>
							<input type="submit" value="Lire l'article">
						</td>
					</tr>
<?php
				echo "</form>";
			}	
			echo "</table>";
		}
	}
?>