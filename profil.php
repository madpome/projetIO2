<?php
function profil(){
	if(!isconnected()){
		pasencoreinscrit();
	}else{
?>
		<div id="center">
		<h2>Mon profil</h2>
		<table id="tableprofil">
		<tr>
			<td>
				Nom:
			</td>
			<td>
				<?php echo htmlentities($_SESSION["lastname"]); ?>
			</td>
		</tr>
		<tr>
			<td>
				Prénom:
			</td>
			<td>
				<?php echo htmlentities($_SESSION["firstname"]); ?>
			</td>
		</tr>
		<tr>
			<td>
				Adresse mail:
			</td>
			<td>
				<?php echo htmlentities($_SESSION["mail"]); ?>
			</td>
		</tr>
		<tr>
			<td>
				
			</td>
			<td>
				<a href="index.php?page=supprarticle">Supprimer un de mes article</a><br>
			</td>
		<tr>
			<td></td>
			<td>
				<a href="index.php?page=inscription">Modifier mes données personnelles</a><br>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<a href="index.php?page=choixmodif">Modifier un de mes articles</a>
			</td>
		</tr>
		<tr>
	<?php
		if($_SESSION["rank"]==1){
?>
			<td></td>
			<td>Commandes administrateur</td>
		</tr>
		<tr>
			<td></td>
<?php
			admincommande();
	?>
		</tr>
		</table>
<?php
		}
?>
		</div>
		<div>
			<table>
				<tr>
					<td>
						Votre liste d'article :
					</td>
				</tr>
		<?php			    
					afficherListeArticle ($_SESSION["user"], "user");
		?>
				</table>
		</div>
	
	<?php
	}
}
function pasencoreinscrit(){
?>
<div id="pasencoreinscrit">
	Vous devez être connecté pour acceder à cette page.<br>
	<a href="index.php?page=inscription">Pas encore inscrit ? Cliquez ici !</a>
</div>
<?php
}
?>