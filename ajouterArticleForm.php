<?php
//Créer un formulaire pour l'ajout d'un article
	function formajoutarticle(){
		$server="localhost";
		$user="phiear22";
		$base="phiear22";
		$connexion=@mysql_connect($server,$user,'r1M)qu0K');
		//$category = listeCategory($connexion);
		if($_SESSION["connect"]){
?>
		<div id="formarticle">
			<form method="post" action="ajouterArticle.php">
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
				
				<!---<select name="category">
					<?php
					foreach ($category as $v) {
						echo("<option value=$v");
						if($_POST["category"] == "$v"){
							echo("selected");
						}
						echo ">.".htmlentities($v)."</option>";
					}
					?>
				</select>--->
				
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
