<?php
	function formrechercherarticle(){
?>
	<div>
		<form action="index.php?page=resultat" method="post">
			 Auteur :<input type="text" name="auteur"><br>
			 Date :<input type="date" name="date"> <br>
			 Titre :<input type="text" name="title"><br>
			 Rechercher dans (catégorie?):
			 <select name="category">
<?php
			$categories = listeCategory();
			foreach($categories as $v) {
				echo '<option value='.$v.'>'.$v.'</option>';
			}
?>
				<option value="all"> Toutes catégories </option>
			</select>
			<input type="submit" value="Lancer la recherche">
		</form>
	</div>
<?php
	}
	function resultatrecherche(){
		$données;
		$attr;
		$idx=0;
		if (!empty($_POST["auteur"])) {
			$données[$idx] =$_POST["auteur"];
			$attr[$idx] = "user";
			$idx++;
		}
		if (!empty($_POST["date"])) {
			$données[$idx] =$_POST["date"];
			$attr[$idx] = "date";
			$idx++;		
		}
		if (!empty($_POST["title"])) {
			$données[$idx] =$_POST["title"];
			$attr[$idx] = "title";
			$idx++;		
		}
		if ($_POST["category"] != "all") {
			$données[$idx] = $_POST["category"];
			$attr[$idx] = "category";
			$idx++;
		}
		afficherListeArticle($données, $attr);
	}
	
	function affichagerecherchecategorie(){
		foreach($categories as $v) {
?>
		<form action="index.php?page=resultat" method="post">
			Catégorie <?php echo htmlentities($v);?>
			<input type="hidden" value=<?php echo htmlentities($v);?>
			<input type="submit" value="Afficher les articles de cette catégorie">
		</form>
<?php
		}
	}
?>
