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
				Articles
				<ul>
					<li>
						Politiques
					</li>
					<li>
						Sports
					</li>
					<li>
						Chamboudi
					</li>
				</ul>
			</li>
			<li>
				Recherche
				<ul>
					<li>
						Sous1
					</li>
					<li>
						Sous2
					</li>
					<li>
						Sous3
					</li>
				</ul>
			</li>
			<li>
				JSP
				<ul>
					<li>
						Sous1
					</li>
					<li>
						Sous2
					</li>
					<li>
						Sous3
					</li>
				</ul>
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
?>
