<?php 
//Fonction qui sert a vérifier que les mots de passes correspondent et que l'utilisateur/mail n'a pas déja été utilisé (inscription)
function verification(){
	$valide=true;
	if ($_POST["pwd"]!=$_POST["pwd2"]){
		$valide=false;
		//Verification username/mail pas déja utilisé
	}
	$req='SELECT user,mail FROM users WHERE user="'.@mysql_real_escape_string($_POST["user"]).'"OR mail="'.@mysql_real_escape_string($_POST["mail"]).'"';
	$resultat=mysql_query($req);
	$ligne=mysql_fetch_assoc($resultat);
	if(!empty($ligne) || $ligne!=false){
		$valide=false;
	}
	return $valide;
}
function verificationupdate(){
	$valide=true;
	if ($_POST["pwd"]!=$_POST["pwd2"]){
		$valide=false;
		//Verification username/mail pas déja utilisé
	}
	$req='SELECT mail,user FROM users WHERE user="'.@mysql_real_escape_string($_SESSION["user"]).'"';
	$resultat=mysql_query($req);
	$ligne=mysql_fetch_assoc($resultat);
	if($ligne && $ligne["user"]!=$_SESSION["user"]){
		$valide=false;
	}
	return $valide;
}
//fonction de hachage+sel automatique, sert aussi de verification
function hachage($mdp){
	$hache=password_hash($mdp,PASSWORD_DEFAULT);
	if($hache==false){
		return false;
	}else{
		return $hache;
	}
}
?>
