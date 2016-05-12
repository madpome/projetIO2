<?php
	$server="pams.script.univ-paris-diderot.fr";
	$user="phiear22";
	$base="phiear22";
	$connexion=mysql_connect($server,$user,'r1M)qu0K');
	$category = listeCategory ($connexion);
	function encoreunefonction(){
?>
	<div>
		<?php
		if($_SESSION["connect"]) {
		?>
		
			<form method="post" action="">
				<?php
				if(isset($_POST["title"]{
					$value = $_POST["title"];
				} else {
					$value = "Votre titre";
				}
				?>
				Titre :<input type=text name=title size=50 value="<?php echo"$value"; ?>" maxlength=200 required>(200 caractères max)

				<?php
				if(isset($_POST["content"])){
					$value = $_POST["content"];
				} else {
					$value = "Votre article";
				}
				?>
				<textarea name="content" rows="50" cols="50" maxlength="20000" required><?php echo $value; ?> </textarea>(20.000 caractères max)
		
				<select name="category">
					<?php
					foreach ($category as $v) {
						echo("<option value=$v");
						if($_POST["category"] == "$v")
							echo("selected");
						}
						echo("> $v </option>");
					}
					?>
				</select>
				
				<input type="submit" value="Envoyer">
			</form>
			
			
		<?php
		} else {
		?>
		
			Vous devez être connecté pour poster un article
			<a href=""> Se connecter </a>
			
		<?php
		}
		?>
	</div>
<?php
}
?>
