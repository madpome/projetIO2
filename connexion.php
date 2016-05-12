<?php
//Verification pour la connexion
function connexion($login,$mdp){
	$server="pams.script.univ-paris-diderot.fr";
	$user="phiear22";
	$base="phiear22";
	$connexion=mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
	$req='SELECT pwd,mail FROM users WHERE login="'.mysql_real_escape_string($login).'"';
	$resultat=mysql_query($req,$connexion);
	$ligne=mysql_fetch_assoc($resultat);
	if ($ligne && $mdp==password_verify($mdp,$ligne["pwd"])){
		$_SESSION["login"]=$login;
		$_SESSION["mail"]=$ligne["mail"];
		return true;
	}else{
		return false;
	}
	mysql_close();
}
//Met les attributs utiles de l'utilisateur dans la session
function getatt(){
	$server="pams.script.univ-paris-diderot.fr";
	$user="phiear22";
	$base="phiear22";
	$connexion=mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
	$req='SELECT user,mail,lastname,firstname,rank FROM users WHERE login='.$_SESSION["login"];
	$result=mysql_query($req);
	$attribut=mysql_fetch_assoc($result);
	$_SESSION["user"]=$attribut["user"];
	$_SESSION["mail"]=$attribut["mail"];
	$_SESSION["lastname"]=$attribut["lastname"];
	$_SESSION["firstname"]=$attribut["firstname"];
	$_SESSION["connect"]=true;
}
//Set la valeur connecté pour la premiere connexion et permet de savoir si on est connecté ou pas
function isconnected(){
	if(isset($_SESSION["connect"])){
		return $_SESSION["connect"];
	}else{
		$_SESSION["connect"]=false;
		return false;
	}
}
//Retire les attributs de la session
function deconnexion(){
	session_unset();
	$_SESSION["connect"]=false;
	$_SESSION["user"]=null;
	$_SESSION["firstname"]=null;
	$_SESSION["lastname"]=null;
	$_SESSION["mail"]=null;
	
	header('Location: index.php');
}
//Formulaire qui s'affiche POUR se connecter
function formcon(){
?>
	<div id="connexion">
	<form method="POST" action="index.php?&page=connexion">
		<input type="text" placeholder="Nom d'utilisateur" name="login" required>
		<input type="password" placeholder="Mot de passe" name="pwd" required>
		<input type="submit" value="Me connecter">
	</form>
	</div>
<?php
}
//Formulaire qui s'affiche pour se déconnecter
function formuncon(){
?>
	<div id="connexion">
	<form method="GET" action="index.php">
		<input type="hidden" name="page" value="deconnexion">
		<input type="submit" value="Deconnexion">
	</form>
	</div>
<?php 
}
//Si la connexion echou
function nonvalide(){
	echo "L'utilisateur/mot de passe renseigné n'existent pas/ne correspondent pas";
}
?>	
