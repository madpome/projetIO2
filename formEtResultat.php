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
		$donnees;
		$attr;
		if (isset($_POST["auteur"])) {
			$donnees[0] =$_POST["auteur"]);
			$attr[0] = "user";
		}
		if (isset($_POST["date"])) {
			$donnees[1] =$_POST["date"];
			$attr[1] = "date";
		}
		if (isset($_POST["title"])) {
			$donnees[2] =$_POST["title"];
			$attr[2] = "title";
		}
		if ($_POST["category"] != "all") {
			$donnees[3] = $_POST["category"];
			$attr[3] = "category";
		}
		afficherListeArticle($données, $attr);
	}
?>
