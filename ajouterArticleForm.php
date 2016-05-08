<?php
	function encoreunefonction(){
?>
	<div>
		<?php
		if($_SESSION["connect"]) {
		?>
		
			<form method="post" action="ajouterArticle.php">
				<?php
				if(isset($_POST["title"]{
					$value = $_POST["title"];
				} else {
					$value = "Votre titre";
				}
				?>
				<label> Titre : <label> <input type=text name=title size=50 value=<?php echo("$value");?> maxlength=200 required> <label> (200 caractères max) </label>

				<?php
				if(isset($_POST["content"])){
					$value = $_POST["content"];
				} else {
					$value = "Votre article";
				}
				?>
				<textarea name=\"content\" rows=\"50\" cols=\"50\" value=$value maxlength=\"20000\" required> Ecrivez votre article ici </textarea> <label> (20.000 caractères max) </label>
				
				<select name="category">
					<option value="cinema" <?php if($_POST["category"] == "cinéma"){echo("selected");?>> Cinéma </option>
					<option value="litterature" <?php } else if {$_POST["category"] == "littérature") {echo("selected");?>> Littérature </option>
					<option value="autre" <?php } else {echo("selected");}?>> Autre </option>
					<!-- Insérer ici de nouvelles catégories-->
				</select>
				
				<input type="submit" value="Envoyer">
			</form>
			
			
		<?php
		} else {
		?>
		
			<label> Vous devez être connecté pour poster un article </label>
			<a href=""> Se connecter </a>
			
		<?php
		}
		?>
	</div>
<?php
}
?>
