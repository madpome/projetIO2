<?php
	function welcome(){
		if($_SESSION["connect"]){
			echo "BONJOUR ".htmlentities($_SESSION["firstname"])." ".htmlentities($_SESSION["lastname"])." votre mail est :".htmlentities($_SESSION["mail"]);
		}else{
			echo 'BONJOUR INCONNU, ';
		}
	}
	//Créer le footer
	function footer(){
?>
Site crée par:
<br>
<table id="lespieds">
	<tr>
		<td>Philippe</td>
		<td>EAR</td>
		<td>earphilippefr@gmail.com</td>
	</tr>
	<tr>
		<td>Maël</td>
		<td>DEBOIS</td>
		<td>mael.debs@gmail.com</td>
	</tr>
	<tr>
		<a href=#thetop>Revenir au début</a>
	</tr>
</table>

<?php
	}
	//Créer le menu verticale à gauche
	function menuvert(){
?>
	<div id="menuvert">
		<ul>
			<li>
				<?php
					echo "Bienvenue <br>";
					if ($_SESSION["connect"]){
						echo htmlentities($_SESSION["lastname"])." ".htmlentities($_SESSION["firstname"]);
					}else{
						echo "invité !";
					}
				?>
			</li>
			<li>
				<?php
					if($_SESSION["connect"]){
				?>
					<a href="index.php?page=profil">Mon profil</a>
				<?php
					}else{
				?>
						<a href="index.php?page=inscription">M'inscrire</a>
				<?php
					}
				?>
			</li>
			<li>
				<?php
					if($_SESSION["connect"]){
				?>
					<a href="index.php?page=ecrire">Ecrire un article</a>
				<?php
					}
				?>
			</li>
		</ul>
	</div>
<?php
	}
	//Créer le menu horizontal de navigation
	function menuhori(){
?>
		<div id="menuhori">
		<ul>
			<li>
				<a href="index.php">Derniers articles écrit</a>
			</li>
			<li>
				<a href="index.php?page=recherche">Recherche un article</a>
			</li>
			<li>
				<a href="index.php?page=category">Les articles par catégories</a>
			</li>
		</ul>
	</div>
<?php
	}
	//Creer un bouton de retour a l'accueil
	function accueil(){
?>
	<div id="retouraccueil">
		<form type="GET" action="index.php">
			<input type="submit" value="Retour à l'accueil">
		</form>
	</div>
<?php
	}
	function welcomejesaispas(){
?>
	<div>
		<?php
		
		//On implente ici la variable pour déterminer le nombre d'articles affichés ici
		if (isset($_POST["nbArticles"])) {
			$nbArticles = $_POST["nbArticles"] + 6;
		} else {
			$nbArticles = 6;
		}
		
		$server="pams.script.univ-paris-diderot.fr";
		$user="phiear22";
		$base="phiear22";
		$connexion=mysql_connect($server,$user,'r1M)qu0K');
		$value = chercherS(null, null, $connexion);
		
		$value = array_reverse($value, true);
		$compteur = 0;
		foreach($value as $v){
			$compteur++;
			affichage_partiel($v);
			?>
			<!-- lien vers les articles affichés -->
			<form action="index.php" method="get">
				<input type="hidden" name="article" value=" <?php echo htmlentities($v); ?>">
				<input type="submit" value="aller à l'article">
			</form>
			<?php
			if($compteur == $nbArticles) {
				break;
			}
		}
		?>
	</div>
	
	<div>
		<!-- Lien pour afficher plus d'articles, toujours dans l'ordre "plus récent"-->
		<form action="welcome.php" method="get">
			<input type="hidden" value="<?php echo htmlentities($nbArticles); ?>">
			<input type="submit" value="Voir plus">
		</form>
	</div>
<?php
}
?>
