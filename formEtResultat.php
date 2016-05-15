<?php
function formrechercherarticle(){
?>
<div>
	<table>
		<h2>Chercher un article :</h2>
		<form action="index.php?page=resultat" method="post">
			<tr>
				<td>
				Auteur :
				</td>
				<td>
				<input type="text" name="auteur">
				</td>
			</tr>
			<tr>
				<td>
				Titre :
				</td>
				<td>
				<input type="text" name="title">
				</td>
			</tr>
			<tr>
				<td>
				Catégorie:
				</td>
				<td>
				<select name="category">
<?php
				$categories = listeCategory();
				foreach($categories as $v) {
					echo '<option value='.htmlentities($v).'>'.htmlentities($v).'</option>';
				}
?>
					<option value="all"> Toutes catégories </option>
				</select>
				</td>
				<td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
				<input type="submit" value="Lancer la recherche">
				</td>
			</tr>
		</form>
	</table>
</div>

<?php
}
function resultatrecherche(){
	$donnees=array();
	$attr=array();
	$idx=0;
	if(!empty($_POST["auteur"])) {
		$donnees[$idx] =$_POST["auteur"];
		$attr[$idx] = "user";
		$idx++;
	}
	if(!empty($_POST["title"])) {
		$donnees[$idx] =$_POST["title"];
		$attr[$idx]="title";
		$idx++;		
	}
	if($_POST["category"]!="all") {
		$donnees[$idx]=$_POST["category"];
		$attr[$idx]="category";
		$idx++;
	}
	afficherListeArticle($donnees,$attr);
}
?>