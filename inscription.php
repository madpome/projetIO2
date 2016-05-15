<?php 
	//Inscription si l'utilisateur s'inscrit;
	function non_inscrit(){
?>
	<form method="POST" action="index.php?page=save">
		<table id="inscription">
			<tr>
				<label for="userid">
					<td>Nom d'utilisateur:</td>
					<td><input type="text" name="user" id="userid" placeholder="Votre nom d'utilisateur" required></td>
				</label>
			</tr>
			<tr>
				<label for="lastname">
					<td>Nom:</td>
					<td><input type="text" name="lastname" id="lastname" placeholder="Votre nom" required></td>
				</label>
			</tr>
			<tr>
				<label for="firstname">
					<td>Prénom:</td>
					<td><input type="text" name="firstname" id="firstname" placeholder="Votre prénom" required></td>
				</label>
			</tr>
			<tr>
				<label for="pwd">
					<td>Mot de passe: </td>
					<td><input type="password" name="pwd" id="pwd" placeholder="Votre mot de passe" minlength="6" maxlength="25" required></td>
				</label>
			</tr>
			<tr>
				<label for="pwd2">
					<td>Confirmez le mot de passe: </td>
					<td><input type="password" name="pwd2" id="pwd2" placeholder="Confirmez" minlength="6" maxlength="25" required></td>
				</label>
			</tr>
			<tr>
				<label for="mail">	
					<td>Adresse e-mail: </td>
					<td><input type="mail" name="mail" id="mail" placeholder="Votre adresse mail" required></td>
				</label>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Envoyer">
				<input type="reset" value="Annuler"></td>
			</tr>
		</table>
	</form>
<?php
	}
	
	//Inscription pour modification du profil d'un utilisateur connecté
	function inscrit(){
?>
		<form method="POST" action="index.php?page=update">
			<table id="inscription">
				<tr>
					<label for="lastname">
						<td>Nom:</td>
						<td><input type="text" name="lastname" id="lastname" value="<?php echo htmlentities($_SESSION["lastname"]);?>" required></td>
					</label>
				</tr>
				<tr>
					<label for="firstname">
						<td>Prénom:</td>
						<td><input type="text" name="firstname" id="firstname" value="<?php echo htmlentities($_SESSION["firstname"]);?>" required></td>
					</label>
				</tr>
				<tr>
					<label for="pwd">
						<td>Mot de passe: </td>
						<td><input type="password" name="pwd" id="pwd" placeholder="Votre nouveau mot de passe" minlength="6" maxlength="25" required></td>
					</label>
				</tr>
				<tr>
					<label for="pwd2">
						<td>Confirmez le mot de passe: </td>
						<td><input type="password" name="pwd2" id="pwd2" placeholder="Confirmez" minlength="6" maxlength="25" required></td>
					</label>
				</tr>
				<tr>
					<label for="mail">	
						<td>Adresse e-mail: </td>
						<td><input type="mail" name="mail" id="mail" value="<?php echo htmlentities($_SESSION["mail"]) ;?>" required></td>
					</label>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Envoyer">
					<input type="reset" value="Annuler"></td>
				</tr>
			</table>
		</form>
<?php
	}
?>