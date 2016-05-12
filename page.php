<?php
	function welcome(){
		if($_SESSION["connect"]){
			echo "BONJOUR ".$_SESSION["firstname"]." ".$_SESSION["lastname"]." votre mail est :".$_SESSION["mail"];
		}else{
			echo 'BONJOUR INCONNU, ';
		}
	}
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
	function menuvert(){
?>
	<div id="menuvert">
		<ul>
			<li>
				<?php
					echo "Bienvenue <br>";
					if ($_SESSION["connect"]){
						echo $_SESSION["lastname"]." ".$_SESSION["firstname"];
					}else{
						echo "invité !";
					}
				?>
			</li>
			<li>
				<?php
					if($_SESSION["connect"]){
				?>
					<a href="index.php&page=profil">Mon profil</a>
				<?php
					}
				?>
			</li>
			<li>
				<?php
					if($_SESSION["connect"]){
				?>
					<a href="index.php&page=ecrire">Ecrire un article</a>
				<?php
					}
				?>
			</li>
		</ul>
	</div>
<?php
	}
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
?>
