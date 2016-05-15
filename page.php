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
			if(isconnected()){
				if($_SESSION["rank"]==0){
					echo " Statut : Membre";
				}else{
					echo " Statut : Administrateur";
				}
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
			<a href="index.php?page=allCat">Les articles par catégories</a>
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
function sixarticles(){
	$server="pams.script.univ-paris-diderot.fr";
	$user="phiear22";
	$base="phiear22";
	$con=@mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$con);
	$req='SELECT * FROM article ORDER BY date DESC LIMIT 6';
	$result=mysql_query($req,$con) or die(mysql_error());
	echo "<h2>Derniers articles ajoutés :</h2>";
	while($ligne=mysql_fetch_assoc($result)){
?>
		<div class="sixarticles">
			<table class="petitrectangle">
				<tr>
					<td colspan=3>
					<span id="fat">Titre :</span> <?php echo htmlentities($ligne["title"]);?>
					</td>
				</tr>
				<tr>
					<td>
					<span id="fat">Auteur :</span> <?php echo htmlentities($ligne["user"]);?>
					</td>
					<td id="contenu">
					<span id="fat">Date :</span> <?php echo htmlentities($ligne["date"]);?>
					</td>
					<td id="center">
						<a href="index.php?page=article&article=<?php echo htmlentities($ligne["title"]);?>">Lire l'article</a>
					</td>
				</tr>
			</table>
		</div>
<?php
	}
}
?>