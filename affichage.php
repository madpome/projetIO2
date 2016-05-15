<?php
	//Permet l'affichage d'un article entier
	//Rajouter un lien vers la page du mec?
	function  affiche_article($article_name) {
		$server="localhost";
		$user="phiear22";
		$base="phiear22";
		$connexion=@mysql_connect($server,$user,'r1M)qu0K');
		mysql_select_db($base,$connexion);
		$req='SELECT * FROM article WHERE title="'.$article_name.'"';
		$result=mysql_query($req,$connexion) or die(mysql_error());
		$article=mysql_fetch_assoc($result);
		$article["content"]=htmlentities($article["content"]);
		$article["content"]=str_replace("\n","<br>",$article["content"]);
		echo '<div id="title"><span id="fat">'.htmlentities($article["title"]).' </span> écrit par <span id="fat">'.htmlentities($article["user"]).' </span>le <span id="fat">'.htmlentities($article["date"]).'</span></div><br>';
		echo '<article>'.$article["content"].'</article>';
	}
	
	//Permet l'affichage partiel d'un article dans la page d'accueil
	function affichage_partiel($article) {
		echo "<div>".htmlentities($article["title"])." par ".htmlentities($article["user"]);
		echo "<img src= ";
		switch($article["category"]) {
			case "blabla":
				echo("\"chemin vers l'image\" alt=\"\"");
				break;
		}
	}
	function caseCategory($category){
		$cat=$category["name"];
?>
		<div class="categorySquare"><a href="index.php?page=perCat&cat=<?php echo $cat;?>"><img src="<?php echo $cat.".png";?>" alt="<?php echo $cat;?>"></a></div>
<?php
	}
	function parCategory(){
		$server="localhost";
		$user="phiear22";
		$base="phiear22";
		$connexion=@mysql_connect($server,$user,'r1M)qu0K');
		mysql_select_db($base,$connexion);
		$req='SELECT * FROM category ORDER BY category_id DESC';
		$result=mysql_query($req,$connexion);
		echo '<div id="allCategory">';
		while($ligne=mysql_fetch_assoc($result)){
			caseCategory($ligne);
		}
		echo '</div>';
	}
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
