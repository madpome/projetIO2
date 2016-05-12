<?php
	function formrechercherarticle(){
?>
	<div>
		<form action="resultat.php" method="post">
			 Auteur :<input type="text" name="auteur"><br>
			 Date :<input type="date" name="date"> <br>
			 Titre :<input type="text" name="title"><br>
			 Rechercher dans (catégorie?):
			 <select name="category">
					<option value="cinema"> Cinéma </option>
					<option value="litterature"> Littérature </option>
					<option value="autre">	Autre </option>
					<option value="all" selected> Toutes </option>
					<!-- Insérer ici de nouvelles catégories-->
				</select>
			<input type="submit" value="Lancer la recherche">
		</form>
	</div>
<?php
	}
	function (){
		$données;
		$attr;
		if (isset($_POST["auteur"])) {
			$données[0] =$_POST["auteur"]);
			$attr[0] = "user";
		}
		if (isset($_POST["date"])) {
			$données[1] =$_POST["date"];
			$attr[1] = "date";
		}
		if (isset($_POST["title"])) {
			$données[2] =$_POST["title"];
			$attr[2] = "title";
		}
		if ($_POST["category"] != "all") {
			$données[3] = $_POST["category"];
			$attr[3] = "category";
		}
		afficherListeArticle($données, $attr, $connexion);
	}
?>
